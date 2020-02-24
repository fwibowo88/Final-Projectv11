@extends('layout.adminLayout')

@section('style')
  <!-- Select2 -->
<link rel="stylesheet" href="{{asset('asset/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection

@section('script')
<!-- Select2 -->
<script src="{{asset('asset/plugins/select2/js/select2.full.min.js')}}"></script>
@endsection

@section('customScript')
<script type="text/javascript">
$(document).ready(function() {
  $('.js-example-basic-single').select2();
});
</script>

<!-- Email AutoFill -->
<script type="text/javascript">
$(document).ready(function(){
  $('#fname ,#lname').keyup(function(){
    var eFname = $('#fname').val().toLowerCase();
    var eLname = $('#lname').val().toLowerCase();

    $('#email').val(eFname+eLname+'@smkstlouis.sch.id');

  });
});
</script>

<!-- Password Matcher -->
<script type="text/javascript">
$(document).ready(function(){
  $('#Password ,#RePassword').keyup(function(){
    passwordMatch()
  });
});

function passwordMatch()
{
  var pwd = $('#Password').val();
  var rePwd = $('#RePassword').val();

  if(pwd == rePwd)
  {
    $('#Password').removeClass('is-invalid');
    $('#RePassword').removeClass('is-invalid');
    $('#Password').addClass('is-valid');
    $('#RePassword').addClass('is-valid');
  }
  else if(pwd != rePwd){
    $('#Password').removeClass('is-valid');
    $('#RePassword').removeClass('is-valid');
    $('#Password').addClass('is-invalid');
    $('#RePassword').addClass('is-invalid');
  }
}
</script>
@endsection

@section('titleBar','IIS | Master Employee')

@section('pageTitle','Master Employee')

@section('pageContent')
<div class="container-fluid">
  <div class="card card-primary">
    <div class="card-header">
      <div class="col-sm-10">
        <h2 class="card-title">Create Master Employee</h2>
      </div>
    </div>
    <!-- /.card-header -->
    <form role="form" action="{{route('employee.store')}}" method="post">
      {{csrf_field()}}
    <div class="card-body">
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label>NIK</label>
            <input type="text" class="form-control" name="employeeNik" placeholder="Ex : 11223344" required>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label>Department</label>
            <select class="js-example-basic-single form-control" name="employeeDepartment" required>
              @foreach($departments as $department)
              <option value="{{$department->id}}">{{$department->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label>First Name</label>
            <input type="text" class="form-control" id=fname name="employeeFname" placeholder="Ex : Jane" required>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label>Last Name</label>
            <input type="text" class="form-control" id=lname name="employeeLname" placeholder="Ex : Doe" required>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label>Address</label>
        <textarea class="form-control" name="employeeAddress" rows="3" placeholder="Employee Address . . . "></textarea>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" name="employeePhone" placeholder="+628123456789" required>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" id="email" name="employeeMail" placeholder="jane@smkstlouis.sch.id" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <label>Password</label>
          <input type="password" name="employeePassword" id="Password" class="form-control" value="smkstlouis{{date('dmy')}}" required>
          <small>Default Password : smkstlouis{{date('dmy')}}</small>
        </div>
        <div class="col-6">
          <label>Re Type Password</label>
          <input type="password" name="employeeRePassword" id="RePassword" class="form-control" value="smkstlouis{{date('dmy')}}" required>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="btn-group float-right">
        <a class="btn btn-danger" href="{{route('employee.index')}}">Cancel</a>
        <button type="submit" class="btn btn-primary" name="button">Save</button>
      </div>
    </div>
  </form>
  </div>
</div>
@endsection
