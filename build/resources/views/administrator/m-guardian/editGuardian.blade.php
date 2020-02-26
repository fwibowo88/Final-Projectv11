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
    <form role="form" action="{{route('guardian.update',$guardian->id)}}" method="post">
      {{method_field('PUT')}}
      {{csrf_field()}}
    <div class="card-body">
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label>Student-ID</label>
            <select class="js-example-basic-single form-control" name="guardianStudent" required>
              @foreach($students as $student)
              @if($guardian->student_id == $student->id)
              <option value="{{$student->id}}" selected>{{$student->nis."-".$student->fname." ".$student->lname}}</option>
              @else
              <option value="{{$student->id}}">{{$student->nis."-".$student->fname." ".$student->lname}}</option>
              @endif
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label>Relation</label>
            <select class="form-control" name="guardianRelation">
              @if($guardian->relation == 'father')
              <option value="father" selected>Father</option>
              <option value="mother">Mother</option>
              <option value="guardian">Guardian</option>
              @elseif($guardian->relation == 'mother')
              <option value="father">Father</option>
              <option value="mother" selected>Mother</option>
              <option value="guardian">Guardian</option>
              @else
              <option value="father">Father</option>
              <option value="mother">Mother</option>
              <option value="guardian" selected>Guardian</option>
              @endif
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label>First Name</label>
            <input type="text" class="form-control" name="guardianFName" value="{{$guardian->fname}}" required>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label>Last Name</label>
            <input type="text" class="form-control" name="guardianLName" value="{{$guardian->lname}}" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label>Birth Place</label>
            <input type="text" class="form-control" name="guardianBPlace" value="{{$guardian->b_place}}" required>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label>Birth Date</label>
            <input type="date" class="form-control" name="guardianBDate" value="{{$guardian->b_date}}" required>
            <small><b>Date Format :</b> Month/Date/Year</small>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label>Address</label>
        <textarea class="form-control" name="guardianAddress" rows="3" required>{{$guardian->address}}</textarea>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="guardianEmail" value="{{$guardian->email}}" required>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" name="guardianPhone" value="{{$guardian->phone}}" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" id="Password" name="guardianPassword" value="{{'P'.$student->nis}}" required>
            <small><b>Default Password</b> : {{"P".$student->nis}}</small>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label>Re Type Password</label>
            <input type="password" class="form-control" id="RePassword" name="guardianPassword" value="{{'P'.$student->nis}}" required>
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
              @if($guardian->religion_id == $religion->id)
              <option value="{{$religion->id}}" selected>{{$religion->name}}</option>
              @else
              <option value="{{$religion->id}}">{{$religion->name}}</option>
              @endif
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <label>Education</label>
            <select class="form-control" name="guardianEducation" required>
              @if($guardian->education == 'SD')
              <option value="SD" selected>SD / MI Sederajat</option>
              <option value="SMP">SMP / MT Sederajat</option>
              <option value="SMA">SMA / SMK / MA Sederajat </option>
              <option value="Sarjana">S1/S2/S3</option>
              @elseif($guardian->education == 'SMP')
              <option value="SD">SD / MI Sederajat</option>
              <option value="SMP" selected>SMP / MT Sederajat</option>
              <option value="SMA">SMA / SMK / MA Sederajat </option>
              <option value="Sarjana">S1/S2/S3</option>
              @elseif($guardian->education == 'SMA')
              <option value="SD">SD / MI Sederajat</option>
              <option value="SMP">SMP / MT Sederajat</option>
              <option value="SMA" selected>SMA / SMK / MA Sederajat </option>
              <option value="Sarjana">S1/S2/S3</option>
              @else
              <option value="SD">SD / MI Sederajat</option>
              <option value="SMP">SMP / MT Sederajat</option>
              <option value="SMA">SMA / SMK / MA Sederajat </option>
              <option value="Sarjana" selected>S1/S2/S3</option>
              @endif
            </select>
          </div>
        </div>
        <div class="col-4">
          <label>Job</label>
          <input class="form-control" type="text" name="guardianJob" value="{{$guardian->job}}" required>
        </div>
      </div>
      <div class="form-group">
        <label>Notes</label>
        <textarea class="form-control" name="guardianNotes" rows="2">{{$guardian->notes}}</textarea>
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
