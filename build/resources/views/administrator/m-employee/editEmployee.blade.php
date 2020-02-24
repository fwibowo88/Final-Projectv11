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
        <h2 class="card-title">Edit Master Employee</h2>
      </div>
    </div>
    <!-- /.card-header -->
    <form role="form" action="{{route('employee.update',$employee->id)}}" method="post">
      {{method_field('PUT')}}
      {{csrf_field()}}
      <div class="card-body">
        <div class="row">
          <div class="col-4">
            <div class="form-group">
              <label>NIK</label>
              <input type="text" class="form-control" value="{{$employee->nik}}" disabled>
              <input type="hidden" name="employeeNik" value="{{$employee->nik}}">
            </div>
          </div>
          <div class="col-4">
            <div class="form-group">
              <label>Assigned Department</label>
              <p>@foreach($employee->department as $department)
                <span class="badge badge-info">{{$department->name}}</span>
                @endforeach</p>
            </div>
          </div>
          <div class="col-4">
            <div class="form-group">
              <label>Re Assign Department</label>
              <select class="js-example-basic-single form-control" multiple="multiple" name="employeeDepartment[]" required>
                @foreach($departments as $department)
                  <option value="{{$department->id}}">{{$department->name}}</option>
                @endforeach
              </select>
              <small><a data-toggle="modal" data-target="#modal-add-department" href="#modal-add-department">Create Master Department</a></small>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label>First Name</label>
              <input type="text" class="form-control" id="fname" name="employeeFname" value="{{$employee->fname}}" required>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label>Last Name</label>
              <input type="text" class="form-control" id="lname" name="employeeLname" value="{{$employee->lname}}" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>Address</label>
          <textarea class="form-control" name="employeeAddress" rows="3">{{$employee->address}}</textarea>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label>Phone</label>
              <input type="text" class="form-control" name="employeePhone" value="{{$employee->phone}}" required>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" id="email" name="employeeMail" value="{{$employee->email}}" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <label>Password</label>
            <input type="password" name="employeePassword" id="Password" class="form-control" value="{{$employee->password}}" required>
          </div>
          <div class="col-6">
            <label>Re Type Password</label>
            <input type="password" name="employeeRePassword" id="RePassword" class="form-control" value="{{$employee->password}}" required>
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

<!-- Add Master Department -->
<div class="modal fade" id="modal-add-department">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Master Department</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" action="{{route('department.store',$employee->id)}}" method="post">
        <div class="modal-body">
            {{method_field('POST')}}
            {{csrf_field()}}
            <div class="form-group">
              <label>Department Name</label>
              <input class="form-control" type="text" name="departmentName" value="" placeholder="Ex Academic">
            </div>
            <div class="form-group">
              <label>Description</label>
              <textarea class="form-control" name="departmentDescription" rows="3" placeholder="Department Description"></textarea>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.Add Master Department -->
@endsection
