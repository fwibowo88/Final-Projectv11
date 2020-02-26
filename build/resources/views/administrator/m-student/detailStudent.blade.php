@extends('layout.adminLayout')

@section('style')

@endsection

@section('script')

@endsection

@section('customScript')

@endsection

@section('titleBar','IIS | Master Student')

@section('pageTitle','Student Profile')

@section('pageContent')
<div class="container-fluid">
  <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="{{asset('app-data/student/photo/s_img-').$student->nik}}" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$student->fname." ".$student->lname}}</h3>

                <p class="text-muted text-center">STUDENT-CLASS</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>NIS</b> <a class="float-right">{{$student->nis}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>NISN</b> <a class="float-right">{{$student->nisn}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>NIK</b> <a class="float-right">{{$student->nik}}</a>
                  </li>
                </ul>

                <a href="{{route('student.edit',$student->id)}}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-birthday-cake"></i> Birth Date & Place</strong>

                <p class="text-muted">
                  {{$student->b_place.", ".date('d-m-Y',strtotime($student->b_date))}}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Program</strong>

                <p class="text-muted">STUDENT-PROGRAM</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">{{$student->notes}}</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Profile</a></li>
                  <li class="nav-item"><a class="nav-link" href="#report" data-toggle="tab">Report</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="profile">
                    <div class="form-group row">
                      <label class="col-sm-2">Full Name </label>
                      <div class="col-sm-10">
                        {{$student->fname." ".$student->lname}}
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2">Gender </label>
                      <div class="col-sm-10">
                        {{$student->gender}}
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2">Religion </label>
                      <div class="col-sm-10">
                        {{$student->religion->name}}
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2">Address </label>
                      <div class="col-sm-10">
                        {{$student->address.", ".$student->district.", ".$student->sub_district.", ".$student->rt."/".$student->rw.", ".$student->city.", ".$student->province}}
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2">Weight </label>
                      <div class="col-sm-10">
                        @if(is_null($student->weight))
                        -
                        @else
                        {{$student->weight ."KG"}}
                        @endif
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2">Height </label>
                      <div class="col-sm-10">
                        @if(is_null($student->height))
                        -
                        @else
                        {{$student->height ."CM"}}
                        @endif
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2">Blood Type </label>
                      <div class="col-sm-10">
                        {{$student->blood_type}}
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2">Graduate From </label>
                      <div class="col-sm-10">
                        {{$student->gr_from}}
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2">Bank Account</label>
                      @if(is_null($student->bank_acc))
                      <div class="col-sm-10">
                        No Bank Account Recorded
                      </div>
                      @else
                      <div class="col-sm-10">
                        {{$student->bank->name." ".$student->bank_acc}}
                      </div>
                      @endif
                    </div>
                    <hr>
                    <div class="form-group row">
                      <label class="col-sm-2">Guardian </label>
                      <div class="col-sm-10">
                        <ul>
                          @foreach($student->guardians as $guardian)
                          <li>{{$guardian->fname." ".$guardian->lname."-".$guardian->relation}}</li>
                          @endforeach
                        </ul>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="report">
                    <h1>Coming Soonn</h1>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
</div>
@endsection
