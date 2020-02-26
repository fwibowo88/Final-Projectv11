@extends('layout.admissionLayout')

@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('script')

@endsection

@section('customScript')
<script type="text/javascript">

$("input,select,textarea,button").prop('disabled',true);
$("#admissionToken,#btnVerify").prop('disabled',false);

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var tmToken = "";
$( "#btnVerify" ).click(function(e) {

  e.preventDefault();

  tmToken = $('#admissionToken').val();

  if(tmToken != '')
  {
    $.ajax({
       type:'POST',
       url:'{{route("admission.checkToken")}}',
       data:{tmToken:tmToken},
       success:function(data){
         if(data.status == 'OK')
         {
           $('#admissionToken').addClass('is-valid');
           $('#admissionToken').removeClass('is-invalid');
           $("input,select,textarea,button").prop('disabled',false);
           $('#admissionToken,#btnVerify').prop('disabled',true);
           $('#tmAdmissionToken').val(tmToken);
         }
         else
         {
           $('#admissionToken').removeClass('is-valid');
           $('#admissionToken').addClass('is-invalid');
         }
       }
    });
  }
  else {
    tmToken = "";
    alert('Please Input Your Registration Token');
  }
});
// PASSWORD RANDOM GENERATOR
$( "#btnGenPwd" ).click(function(e) {
  var tmRandom1 = parseInt($("#studentHeight").val());
  var tmRandom2 = parseInt($("#studentWeight").val());
  var tRes = tmToken + (tmRandom1*tmRandom2).toString();
  $("#DefaultPassword").html(tRes);
  $("#sPassword").val(tRes);
});
</script>
@endsection

@section('titleBar','IIS | Admission')

@section('pageContent')
@if(isset($announcements))
  @foreach($announcements as $announcement)
  <div class="row">
    <div class="col-12">
      <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-info"></i> {{$announcement->title}}</h5>
        {{$announcement->description}}
      </div>
    </div>
  </div>
  @endforeach
@endif
<div class="row">
  <div class="col-12">
    <div class="card card-primary card-outline card-outline-tabs">
      <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-three-achievment-tab" data-toggle="pill" href="#custom-tabs-three-achievment" role="tab" aria-controls="custom-tabs-three-achievment" aria-selected="false">Achievment</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-three-guardian-tab" data-toggle="pill" href="#custom-tabs-three-guardian" role="tab" aria-controls="custom-tabs-three-guardian" aria-selected="false">Guardian</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content" id="custom-tabs-three-tabContent">
          <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
            <div class="form-group">
              <label>Registration Token</label>
              <div class="input-group input-group-sm">
                <input type="text" class="form-control" id="admissionToken" placeholder="ABC123" required>
                <input type="hidden" name="admissionToken" id="tmAdmissionToken" >
                <span class="input-group-btn">
                  <button type="button" id="btnVerify" name="btnVerify" class="btn btn-info btn-flat btn-sm">Verify</button>
                </span>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>NIK</label><small> (Nomor Induk Kependudukan)</small>
                  <input class="form-control" type="text" name="studentNIK" placeholder="123456789">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>NISN</label><small> (Nomor Induk Siswa Nasional)</small>
                  <input class="form-control" type="text" name="studentNISN" placeholder="123456789">
                  <small><a href="https://nisn.data.kemdikbud.go.id/">Check NISN</a></small>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>First Name</label><small> (Nama Depan)</small>
                  <input class="form-control" type="text" name="studentFName" placeholder="John" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Last Name</label><small> (Nama Belakang)</small>
                  <input class="form-control" type="text" name="studentLName" placeholder="John" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Birth Place</label><small> (Tempat Lahir)</small>
                  <input class="form-control" type="text" name="studentBPlace" placeholder="Surabaya" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Birth Date</label><small> (Tanggal Lahir)</small>
                  <input class="form-control" type="date" name="studentBDate" required>
                  <small><b>Format :</b> mm/dd/yyyy</small>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  <label>Address</label><small> (Alamat)</small>
                  <textarea class="form-control" name="studentAddress" rows="4" placeholder="Jl Tidar No 117" required></textarea>
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                  <label>RT</label>
                  <input class="form-control" type="number" min="0" name="studentRT">
                </div>
                <div class="form-group">
                  <label>RW</label>
                  <input class="form-control" type="number" min="0" name="studentRW">
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label>District</label><small> (Kecamatan)</small>
                  <input class="form-control" type="text" name="studentDistrict" placeholder="Sawahan">
                </div>
                <div class="form-group">
                  <label>Sub District</label><small> (Kelurahan)</small>
                  <input class="form-control" type="text" name="studentSubDistrict" placeholder="Petemon">
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label>City</label><small> (Kota/Kabupaten)</small>
                  <input class="form-control" type="text" name="studentCity" placeholder="Sawahan">
                </div>
                <div class="form-group">
                  <label>Province</label><small> (Provinsi)</small>
                  <input class="form-control" type="text" name="studentProvince" placeholder="Petemon">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  <label>Gender</label><small> (Jenis Kelamin)</small>
                  <select class="form-control" name="studentGender">
                    <option value="male">Male (Pria)</option>
                    <option value="female">Female (Wanita)</option>
                  </select>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label>Blood Type</label><small> (Golongan Darah)</small>
                  <select class="form-control" name="studentBloodType">
                    <option value="A">A</option>
                    <option value="AB">AB</option>
                    <option value="B">B</option>
                    <option value="O">O</option>
                  </select>
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                  <label>Height</label><small> (Tinggi badan)</small>
                  <input class="form-control" type="text" id="studentHeight" name="studentHeight" placeholder="165">
                  <small>centimeters (cm)</small>
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                  <label>Weight</label><small> (Berat Badan)</small>
                  <input class="form-control" type="text" id="studentWeight" name="studentHeight" placeholder="55">
                  <small>kilograms (kg)</small>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <hr>
              </div>
              <div class="col-4">
                <p class="text-center"><b>Preferences</b></p>
              </div>
              <div class="col-4">
                <hr>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Religion</label><small> (Agama)</small>
                  <select class="form-control" name="studentReligion">
                    @foreach($religions as $relgion)
                    <option value="{{$religion->id}}">{{$religion->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Graduate From</label><small> (Asal Sekolah)</small>
                  <input class="form-control" type="text" name="studentGFrom" placeholder="SMP Maju Bangsa">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Bank Name</label><small> (Nama Bank)</small>
                  <select class="form-control" name="studentBank">
                    @foreach($banks as $bank)
                    <option value="{{$bank->id}}">{{$bank->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Account Number</label><small> (Nomor Rekening)</small>
                  <input class="form-control" type="text" name="studentBankAccount" placeholder="0123456789">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Phone</label><small> (Nomor Telepon)</small>
                  <input class="form-control" type="text" name="studentPhone" placeholder="+628123456789">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Email</label><small> (Surat Elektronik)</small>
                  <input class="form-control" type="email" name="studentMail" placeholder="johndoe@smkstlouis.sch.id">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-10">
                <div class="form-group">
                  <label>Password</label>
                  <p><b>Default Password :</b><span id="DefaultPassword"></span></p>
                  <input type="hidden" name="studentPassword" id="sPassword">
                </div>
              </div>
              <div class="col-2">
                <div class="form-group text-center">
                  <label>Generate Password</label>
                  <button class="btn btn-success" type="button" id="btnGenPwd" name="btnGenPwd"><i class="fa fa-sync"></i></button>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="custom-tabs-three-achievment" role="tabpanel" aria-labelledby="custom-tabs-three-achievment-tab">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Primary Selected Programs</label>
                  <select class="form-control" name="studentProgram[]" required>
                    @foreach($programs as $program)
                    <option value="{{$program->id}}">{{$program->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Secondary Selected Programs</label>
                  <select class="form-control" name="studentProgram[]" required>
                    @foreach($programs as $program)
                    <option value="{{$program->id}}">{{$program->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-3">
                <div class="form-group">
                  <label>Indonesian Exam Score</label>
                  <input class="form-control" type="number" min="0" max="100" required name="studentIDN">
                  <small> Nilai Ujian B.Indonesia (Scale 0-100)</small>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label>English Exam Score</label>
                  <input class="form-control" type="number" min="0" max="100" required name="studentENG">
                  <small> Nilai Ujian B.Inggris (Scale 0-100)</small>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label>Mathematic Exam Score</label>
                  <input class="form-control" type="number" min="0" max="100" required name="studentMTH">
                  <small> Nilai Ujian Matematika (Scale 0-100)</small>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label>Science Exam Score</label>
                  <input class="form-control" type="number" min="0" max="100" required name="studentSCI">
                  <small> Nilai Ujian IPA (Scale 0-100)</small>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Total Final Exam Score</label><small> (Total Nilai UN-SKHUN)</small>
                  <input class="form-control" type="number" min="0" name="studentTotalScore" required>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="custom-tabs-three-guardian" role="tabpanel" aria-labelledby="custom-tabs-three-guardian-tab">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>First Name</label><small> (Nama Depan)</small>
                  <input class="form-control" type="text" name="sGuardianFName">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Last Name</label><small> (Nama Belakang)</small>
                  <input class="form-control" type="text" name="sGuardianLName">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Birth Place</label><small> (Tempat Lahir)</small>
                  <input class="form-control" type="text" name="sGuardianBPlace" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Birth Date</label><small> (Tanggal Lahir)</small>
                  <input class="form-control" type="date" name="sGuardianBDate" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Phone</label><small> (Nomor Telepon)</small>
                  <input class="form-control" type="text" name="sGuardianPhone" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Email</label><small> (Surat Elektronik)</small>
                  <input class="form-control" type="email" name="sGuardianEmail" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  <label>Religion</label><small> (Agama)</small>
                  <select class="form-control" name="sGuardianReligion">
                    @foreach($religions as $religion)
                    <option value="{{$relgion->id}}">{{$religion->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label>Education</label><small> (Pendidikan)</small>
                  <select class="form-control" name="sGuardianEducation">
                    <option value="SD">SD / MI Sederajat</option>
                    <option value="SMP">SMP / MT Sederajat</option>
                    <option value="SMA">SMA / SMK / MA Sederajat </option>
                    <option value="Sarjana">S1/S2/S3</option>
                  </select>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label>Job</label><small> (Pekerjaan)</small>
                  <input class="form-control" type="email" name="sGuardianJob" required>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <div class="text-center">
          <button type="button" class="btn btn-primary" name="button">Register</button>
        </div>
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
@endsection
