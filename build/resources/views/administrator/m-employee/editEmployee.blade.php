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
          <div class="col-6">
            <div class="form-group">
              <label>NIK</label>
              <input type="text" class="form-control" name="employeeNik" value="{{$employee->nik}}" required>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label>Department</label>
              <select class="js-example-basic-single form-control" name="employeeDepartment" required>
                @foreach($departments as $department)
                @if($employee->department_id == $department->id)
                <option value="{{$department->id}}" selected>{{$department->name}}</option>
                @else
                <option value="{{$department->id}}">{{$department->name}}</option>
                @endif
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label>First Name</label>
              <input type="text" class="form-control" name="employeeFname" value="{{$employee->fname}}" required>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label>Last Name</label>
              <input type="text" class="form-control" name="employeeLname" value="{{$employee->lname}}" required>
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
              <input type="email" class="form-control" name="employeeMail" value="{{$employee->email}}" required>
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
@endsection