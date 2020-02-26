@extends('layout.adminLayout')

@section('style')

@endsection

@section('script')

@endsection

@section('customScript')

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
    <div class="card-body">
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label>Student-NIS</label>
            <p><a href="{{route('student.show',$guardian->student->id)}}">{{$guardian->student->fname." ".$guardian->student->lname."-".$guardian->student->nis}}</a></p>
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <label>Relation</label>
            <p>{{ucfirst($guardian->relation)}}</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label>First Name</label>
            <p>{{$guardian->fname}}</p>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label>Last Name</label>
            <p>{{$guardian->lname}}</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label>Birth Place</label>
            <p>{{ucfirst($guardian->b_place)}}</p>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label>Birth Date</label>
            <p>{{$guardian->b_date}}</p>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label>Address</label>
        <textarea class="form-control" name="guardianAddress" rows="2" disabled>{{$guardian->address}}</textarea>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label>Email</label>
            <p>{{$guardian->email}}</p>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label>Phone</label>
            <p>{{$guardian->phone}}</p>
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
            <p>{{$guardian->religion->name}}</p>
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <label>Education</label>
            @if($guardian->education == 'SD')
            <p>SD / MI Sederajat</p>
            @elseif($guardian->education == 'SMP')
            <p>SMP / MT Sederajat</p>
            @elseif($guardian->education == 'SMA')
            <p>SMA / SMK / MA Sederajat</p>
            @else
            <p>S1/S2/S3</p>
            @endif
          </div>
        </div>
        <div class="col-4">
          <label>Job</label>
          <p>{{ucfirst($guardian->job)}}</p>
        </div>
      </div>
      <div class="form-group">
        <label>Notes</label>
        <textarea class="form-control" name="guardianNotes" rows="2" disabled>{{$guardian->notes}}</textarea>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="btn-group float-right">
        <a class="btn btn-danger" href="{{route('guardian.index')}}">Cancel</a>
        <a class="btn btn-success" href="{{route('guardian.edit',$guardian->id)}}"><i class="fa fa-edit fa-sm"></i> Edit</a>
      </div>
    </div>
  </div>
</div>
@endsection
