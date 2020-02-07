@extends('layout.adminLayout')

@section('style')

@endsection

@section('script')

@endsection

@section('customScript')
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

@section('titleBar','IIS | Master Student')

@section('pageTitle','Master Student')

@section('pageContent')
<div class="container-fluid">
  <div class="card card-primary">
    <div class="card-header">
      <div class="col-sm-10">
        <h2 class="card-title">Create Master Student</h2>
      </div>
    </div>
    <!-- /.card-header -->
    <form role="form" action="{{route('student.store')}}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="card-body">
        <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="custom-content-below-primary-tab" data-toggle="pill" href="#custom-content-below-primary" role="tab" aria-controls="custom-content-below-primary" aria-selected="true">Primary ID</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Profile & Account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-content-below-sibling-tab" data-toggle="pill" href="#custom-content-below-sibling" role="tab" aria-controls="custom-content-below-sibling" aria-selected="false">Sibling</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-content-below-settings-tab" data-toggle="pill" href="#custom-content-below-settings" role="tab" aria-controls="custom-content-below-settings" aria-selected="false">Other</a>
          </li>
        </ul>
        <div class="tab-content" id="custom-content-below-tabContent">
          <div class="tab-pane fade active show" id="custom-content-below-primary" role="tabpanel" aria-labelledby="custom-content-below-primary-tab">
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  <label>NIK</label>
                  <input type="text" class="form-control" name="studentNik" required>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label>NIS</label>
                  <input type="text" class="form-control" name="studentNis" required>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label>NISN</label>
                  <input type="text" class="form-control" name="studentNisn" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" class="form-control" name="studentFname" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" class="form-control" name="studentLname" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Birth Place</label>
                  <input type="text" class="form-control" name="studentBPlace" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Birth Date</label>
                  <input type="date" class="form-control" name="studentBDate" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  <label>Address</label>
                  <textarea class="form-control" name="studentAddress" rows="4"></textarea>
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                  <label>RT</label>
                  <input type="number" class="form-control" min="0" max="20" name="studentRT" required>
                </div>
                <div class="form-group">
                  <label>RW</label>
                  <input type="number" class="form-control" min="0" max="20" name="studentRW" required>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label>City</label>
                  <input type="text" class="form-control" name="studentCity" required>
                </div>
                <div class="form-group">
                  <label>Province</label>
                  <input type="text" class="form-control" name="studentProvince" required>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label>District</label><small> Kecamatan</small>
                  <input type="text" class="form-control" name="studentDistrict" required>
                </div>
                <div class="form-group">
                  <label>Sub District</label><small> Kelurahan</small>
                  <input type="text" class="form-control" name="studentSubDistrict" required>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="studentEmail" class="form-control" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Phone</label>
                  <input type="text" name="studentPhone" class="form-control" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" id="Password" name="studentPassword" class="form-control" value="smkstlouis{{date('dmy')}}" required>
                  <small>Default Passsword : smkstlouis{{date('dmy')}}</small>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Re Type Password</label>
                  <input type="password" id="RePassword" name="studentRePassword" class="form-control" value="smkstlouis{{date('dmy')}}" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Religion</label>
                  <select class="form-control" name="studentReligion">
                    @foreach($religions as $religion)
                    <option value="{{$religion->id}}">{{$religion->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Blood Type</label>
                  <select class="form-control" name="studentBlood">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="O">O</option>
                    <option value="AB">AB</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Bank Name</label>
                  <select class="form-control" name="studentBank">
                    <option value="" selected></option>
                    @foreach($banks as $bank)
                    <option value="{{$bank->id}}">{{$bank->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Acc Number</label>
                  <input type="text" class="form-control" name="studentBAcc">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Notes</label>
                  <textarea name="studentNotes" class="form-control" rows="5"></textarea>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Graduate Form</label>
                  <input type="text" class="form-control" name="studentOSchool" required>
                </div>
                <div class="form-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="studentPhoto" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="custom-content-below-sibling" role="tabpanel" aria-labelledby="custom-content-below-sibling-tab">
             <h1>Coming Soon</h1>
          </div>
          <div class="tab-pane fade" id="custom-content-below-settings" role="tabpanel" aria-labelledby="custom-content-below-settings-tab">
            <h1>Coming Soon</h1>
          </div>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="btn-group float-right">
        <a class="btn btn-danger" href="{{route('bank.index')}}">Cancel</a>
        <button type="submit" class="btn btn-primary" name="button">Save</button>
      </div>
    </div>
  </form>
  </div>
</div>
@endsection
