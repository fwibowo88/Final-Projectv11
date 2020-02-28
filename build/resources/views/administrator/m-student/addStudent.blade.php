@extends('layout.adminLayout')

@section('style')

@endsection

@section('script')
<!-- bs-custom-file-input -->
<script src="{{asset('asset/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
@endsection

@section('customScript')
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
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

<script type="text/javascript">
function getStudentAddress()
{
    var tmAddress = $('#student-address').val();
    $('#sibling-address').val(tmAddress);
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
            <a class="nav-link" id="custom-content-below-achievment-tab" data-toggle="pill" href="#custom-content-below-achievment" role="tab" aria-controls="custom-content-below-achievment" aria-selected="false">Achievment</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-content-below-sibling-tab" data-toggle="pill" href="#custom-content-below-sibling" role="tab" aria-controls="custom-content-below-sibling" aria-selected="false">Sibling</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-content-below-files-tab" data-toggle="pill" href="#custom-content-below-files" role="tab" aria-controls="custom-content-below-files-tab" aria-selected="false">File & Document</a>
          </li>
        </ul>
        <div class="tab-content" id="custom-content-below-tabContent">
          <div class="tab-pane fade active show" id="custom-content-below-primary" role="tabpanel" aria-labelledby="custom-content-below-primary-tab">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label>Program</label>
                  <select class="form-control" name="studentProgram[]">
                    @foreach($programs as $program)
                    <option value="{{$program->id}}">{{$program->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
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
                  <input type="text" class="form-control" name="studentFname" placeholder="John" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" class="form-control" name="studentLname" placeholder="Doe" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Birth Place</label>
                  <input type="text" class="form-control" name="studentBPlace" placeholder="Surabaya" required>
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
                  <textarea class="form-control" id="student-address" name="studentAddress" placeholder="Jl Tidar No 117" rows="4"></textarea>
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
                  <input type="text" class="form-control" name="studentCity" placeholder="Surabaya" required>
                </div>
                <div class="form-group">
                  <label>Province</label>
                  <input type="text" class="form-control" name="studentProvince" placeholder="Jawa Timur" required>
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
                  <input type="email" name="studentEmail" class="form-control" placeholder="john@smkstlouis.sch.id" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Phone</label>
                  <input type="text" name="studentPhone" class="form-control" minlength="10" placeholder="+628123456789" required>
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
              <div class="col-2">
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
              <div class="col-2">
                <div class="form-group">
                  <label>Weight</label>
                  <input type="number" class="form-control" min="0" name="studentWeight">
                  <small>Weight in Kilograms (KG)</small>
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                  <label>Height</label>
                  <input type="number" class="form-control" min="0" name="studentHeight">
                  <small>Height in Centimeters (CM)</small>
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
                  <label>Graduate From</label>
                  <input type="text" class="form-control" placeholder="SMP Kr Imanuel" name="studentOSchool" required>
                </div>
                <div class="form-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="studentPhoto">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="custom-content-below-achievment" role="tabpanel" aria-labelledby="custom-content-below-achievment-tab">
            <div class="row">
              <div class="col-3">
                <div class="form-group">
                  <label>Indonesian Exam Score</label>
                  <input class="form-control" type="number" min="0" max="100" name="studentIDN">
                  <small> Nilai Ujian B.Indonesia (Scale 0-100)</small>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label>English Exam Score</label>
                  <input class="form-control" type="number" min="0" max="100" name="studentENG">
                  <small> Nilai Ujian B.Inggris (Scale 0-100)</small>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label>Mathematic Exam Score</label>
                  <input class="form-control" type="number" min="0" max="100" name="studentMTH">
                  <small> Nilai Ujian Matematika (Scale 0-100)</small>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label>Science Exam Score</label>
                  <input class="form-control" type="number" min="0" max="100" name="studentSCI">
                  <small> Nilai Ujian IPA (Scale 0-100)</small>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Total Final Exam Score</label><small> (Total Nilai UN-SKHUN)</small>
                  <input class="form-control" type="number" min="0" name="studentTotalScore">
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="custom-content-below-sibling" role="tabpanel" aria-labelledby="custom-content-below-sibling-tab">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label>Relation</label>
                  <select class="form-control" name="siblingRelation" required>
                    <option value="" selected>Please Select</option>
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
                  <input class="form-control" type="text" name="siblingFName" placeholder="John" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Last Name</label>
                  <input class="form-control" type="text" name="siblingLName" placeholder="Doe" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  <label>Birth Place</label>
                  <input class="form-control" type="text" name="siblingBPlace" placeholder="Surabaya" required>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label>Birth Date</label>
                  <input class="form-control" type="date" name="siblingBDate" required>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label>Religion</label>
                  <select class="form-control" name="siblingReligion" required>
                    @foreach($religions as $religion)
                    <option value="{{$religion->id}}">{{$religion->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Address</label><small> <a href="#" onclick="getStudentAddress()"><i class="fa fa-copy"></i>Get Data from Student</a></small>
                  <textarea class="form-control" id="sibling-address" name="siblingAddress" rows="4"></textarea>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Phone</label>
                  <input class="form-control" type="text" minlength="10" name="siblingPhone" placeholder="+628123456789">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input class="form-control" type="email" name="siblingEmail" placeholder="johndoe@smkstlouis.sch.id">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Education</label>
                  <select class="form-control" name="siblingEducation" required>
                    <option value="SD">SD / MI Sederajat</option>
                    <option value="SMP">SMP / MT Sederajat</option>
                    <option value="SMA">SMA / SMK / MA Sederajat </option>
                    <option value="Sarjana">S1/S2/S3</option>
                  </select>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Job</label>
                  <input class="form-control" type="text" name="siblingJob" placeholder="Ex : Teacher" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Guardian ID</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="siblingID" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                    <small><strong>Allowed format .jpg .png .pdf</strong></small>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="custom-content-below-files" role="tabpanel" aria-labelledby="custom-content-below-files-tab">
            <h3>Upload Complimentary Documents</h3>
            <div class="row" id="title">
              <div class="col-6">
                <label>Browse File</label>
              </div>
              <div class="col-4">
                <label>Description</label>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="studentDocument[]" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                    <small><strong>Allowed format .jpg .png .pdf</strong></small>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <input class="form-control" type="text" value="Ijazah SD-Verified" name="stDocumentDescription[]">
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="studentDocument[]" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                    <small><strong>Allowed format .jpg .png .pdf</strong></small>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <input class="form-control" type="text" value="Ijazah SMP-Verified" name="stDocumentDescription[]">
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="studentDocument[]" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                    <small><strong>Allowed format .jpg .png .pdf</strong></small>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <input class="form-control" type="text" value="SKHUN SMP-Verified" name="stDocumentDescription[]">
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="studentDocument[]" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                    <small><strong>Allowed format .jpg .png .pdf</strong></small>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <input class="form-control" type="text" value="Kartu Keluarga" name="stDocumentDescription[]">
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="studentDocument[]" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                    <small><strong>Allowed format .jpg .png .pdf</strong></small>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <input class="form-control" type="text" value="Surat Keterangan Sehat" name="stDocumentDescription[]">
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="btn-group float-right">
        <a class="btn btn-danger" href="{{route('student.index')}}">Cancel</a>
        <button type="submit" class="btn btn-primary" name="button">Save</button>
      </div>
    </div>
  </form>
  </div>
</div>
@endsection
