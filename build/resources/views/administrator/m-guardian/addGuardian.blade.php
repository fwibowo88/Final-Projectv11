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

@section('titleBar','IIS | Master Guardian')

@section('pageTitle','Master Guardian')

@section('pageContent')
<div class="container-fluid">
  <div class="card card-primary">
    <div class="card-header">
      <div class="col-sm-10">
        <h2 class="card-title">Create Master Guardian</h2>
      </div>
    </div>
    <!-- /.card-header -->
    <form role="form" action="{{route('guardian.store')}}" method="post">
      {{csrf_field()}}
    <div class="card-body">
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label>Student-ID</label>
            <select class="js-example-basic-single form-control" name="guardianStudent" required>
              @foreach($students as $student)
              <option value="{{$student->id}}">{{$student->nis."-".$student->fname." ".$student->lname}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label>Relation</label>
            <select class="form-control" name="guardianRelation">
              <option value="father">Father</option>
              <option value="mother">Mother</option>
              <option value="guardian">Guardian</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label>First Name</label>
            <input type="text" class="form-control" name="guardianFName" placeholder="Ex : John" required>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label>Last Name</label>
            <input type="text" class="form-control" name="guardianLName" placeholder="Ex : Doe" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label>Birth Place</label>
            <input type="text" class="form-control" name="guardianBPlace" placeholder="Surabaya" required>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label>Birth Date</label>
            <input type="date" class="form-control" name="guardianBDate" placeholder="Ex : John" required>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label>Address</label>
        <textarea class="form-control" name="guardianAddress" rows="3" placeholder="Jl Tidar No 117, Surabaya" required></textarea>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="guardianEmail" placeholder="johndoe@smkstlouis.sch.id" required>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" name="guardianPhone" placeholder="+628123456789" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" id="Password" name="guardianPassword" value="{{'P'.date('dmhys')}}" required>
            <small><b>Default Password</b> : {{"P".date('dmhys')}}</small>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label>Re Type Password</label>
            <input type="password" class="form-control" id="RePassword" name="guardianPassword" value="{{'P'.date('dmhys')}}" required>
          </div>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-6">
          <hr>
        </div>
        <div class="col-1">
          <p><b>Preferences</b></p>
        </div>
        <div class="col-5">
          <hr>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Religion</label>
            <select class="form-control" name="guardianReligion" required>
              @foreach($religions as $religion)
              <option value="{{$religion->id}}">{{$religion->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <label>Education</label>
            <select class="form-control" name="guardianEducation" required>
              <option value="SD">SD / MI Sederajat</option>
              <option value="SMP">SMP / MT Sederajat</option>
              <option value="SMA">SMA / SMK / MA Sederajat </option>
              <option value="Sarjana">S1/S2/S3</option>
            </select>
          </div>
        </div>
        <div class="col-4">
          <label>Job</label>
          <input class="form-control" type="text" name="guardianJob" placeholder="Teacher" required>
        </div>
      </div>
      <div class="form-group">
        <label>Notes</label>
        <textarea class="form-control" name="guardianNotes" rows="2" placeholder=""></textarea>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="btn-group float-right">
        <a class="btn btn-danger" href="{{route('guardian.index')}}">Cancel</a>
        <button type="submit" class="btn btn-primary" name="button"><i class="fa fa-save"></i> Save</button>
      </div>
    </div>
  </form>
  </div>
</div>
@endsection
