@extends('layout.adminLayout')

@section('style')

@endsection

@section('script')

@endsection

@section('customScript')

@endsection

@section('titleBar','IIS | Master Student')

@section('pageTitle','Master Student')

@section('pageContent')
<div class="container-fluid">
  <div class="card card-primary">
    <div class="card-header">
      <div class="col-sm-10">
        <h2 class="card-title">Edit Master Student</h2>
      </div>
    </div>
    <!-- /.card-header -->
    <form role="form" action="{{route('student.update',$student->id)}}" method="post">
      {{method_field('PUT')}}
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
                  <input type="text" class="form-control" name="studentNik" value="{{$student->nik}}" required>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label>NIS</label>
                  <input type="text" class="form-control" name="studentNis" value="{{$student->nis}}" required>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label>NISN</label>
                  <input type="text" class="form-control" name="studentNisn" value="{{$student->nisn}}" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" class="form-control" name="studentFname" value="{{$student->fname}}" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" class="form-control" name="studentLname" value="{{$student->lname}}" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Birth Place</label>
                  <input type="text" class="form-control" name="studentBPlace" value="{{$student->b_place}}" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Birth Date</label>
                  <input type="date" class="form-control" name="studentBDate" value="{{$student->b_date}}" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  <label>Address</label>
                  <textarea class="form-control" name="studentAddress" rows="4">{{$student->address}}</textarea>
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                  <label>RT</label>
                  <input type="number" class="form-control" min="0" max="20" name="studentRT" value="{{$student->rt}}" required>
                </div>
                <div class="form-group">
                  <label>RW</label>
                  <input type="number" class="form-control" min="0" max="20" name="studentRW" value="{{$student->rw}}" required>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label>City</label>
                  <input type="text" class="form-control" name="studentCity" value="{{$student->city}}" required>
                </div>
                <div class="form-group">
                  <label>Province</label>
                  <input type="text" class="form-control" name="studentProvince" value="{{$student->province}}" required>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label>District</label><small> Kecamatan</small>
                  <input type="text" class="form-control" name="studentDistrict" value="{{$student->district}}" required>
                </div>
                <div class="form-group">
                  <label>Sub District</label><small> Kelurahan</small>
                  <input type="text" class="form-control" name="studentSubDistrict" value="{{$student->sub_district}}" required>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="studentEmail" class="form-control" value="{{$student->email}}" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Phone</label>
                  <input type="text" name="studentPhone" class="form-control" value="{{$student->phone}}" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" id="Password" name="studentPassword" class="form-control">
                  <small>Fill this Field to Change Your Password</small>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Re Type Password</label>
                  <input type="password" id="RePassword" name="studentRePassword" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Religion</label>
                  <select class="form-control" name="studentReligion">
                    @foreach($religions as $religion)
                    @if($religion->id == $student->religion_id)
                    <option value="{{$religion->id}}" selected>{{$religion->name}}</option>
                    @else
                    <option value="{{$religion->id}}">{{$religion->name}}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Blood Type</label>
                  <select class="form-control" name="studentBlood" required>
                    @if($student->blood_type == 'A')
                    <option value="A" selected>A</option>
                    <option value="B">B</option>
                    <option value="O">O</option>
                    <option value="AB">AB</option>
                    @elseif($student->blood_type == 'B')
                    <option value="A">A</option>
                    <option value="B" selected>B</option>
                    <option value="O">O</option>
                    <option value="AB">AB</option>
                    @elseif($student->blood_type == 'O')
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="O" selected>O</option>
                    <option value="AB">AB</option>
                    @else
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="O">O</option>
                    <option value="AB" selected>AB</option>
                    @endif
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
                    @if($bank->id == $student->bank_id)
                    <option value="{{$bank->id}}" selected>{{$bank->name}}</option>
                    @else
                    <option value="{{$bank->id}}">{{$bank->name}}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Acc Number</label>
                  <input type="text" class="form-control" name="studentBAcc" value="{{$student->bank_acc}}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Notes</label>
                  <textarea name="studentNotes" class="form-control" rows="5">{{$student->notes}}</textarea>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Graduate Form</label>
                  <input type="text" class="form-control" name="studentOSchool" value="{{$student->gr_from}}" required>
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
        <a class="btn btn-danger" href="{{route('student.index')}}">Cancel</a>
        <button type="submit" class="btn btn-primary" name="button">Save</button>
      </div>
    </div>
  </form>
  </div>
</div>
@endsection
