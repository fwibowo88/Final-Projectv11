@extends('layout.adminLayout')

@section('style')

@endsection

@section('script')

@endsection

@section('customScript')

@endsection

@section('titleBar','IIS | Absent Record')

@section('pageTitle','Absent Record')

@section('pageContent')
<div class="container-fluid">
  <div class="card card-primary">
    <div class="card-header">
      <div class="col-sm-10">
        <h2 class="card-title">Create Absent Record</h2>
      </div>
    </div>
    <!-- /.card-header -->
    <form role="form" action="{{route('absent-record.store')}}" method="post">
      {{csrf_field()}}
    <div class="card-body">
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label>Student Name - NIS</label>
            <p>{{$absent->student->nis." - ".$absent->student->fname." ".$absent->student->lname}}</p>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label>Type</label>
            @if($absent->type == 'A')
            <p><span class="badge badge-info">{{$absent->type}} - Alpha</span></p>
            @elseif($absent->type == 'I')
            <p><span class="badge badge-info">{{$absent->type}} - Permission(Ijin)</span></p>
            @elseif($absent->type == 'S')
            <p><span class="badge badge-info">{{$absent->type}} - Sick(Sakit)</span></p>
            @else
            <p><span class="badge badge-info">{{$absent->type}} - Late(Terlambat)</span></p>
            @endif
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label>Start Date</label>
            <p>{{date("d-m-Y",strtotime($absent->start_date))}}</p>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label>End Date</label>
            <p>{{date("d-m-Y",strtotime($absent->end_date))}}</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="absentDescription" rows="3" disabled>{{$absent->description}}</textarea>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="customFile">Custom File</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile">
              <img src="#" alt="receiptAbsent{{$absent->id}}">
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="btn-group float-right">
        <a class="btn btn-danger" href="{{route('absent-record.index')}}">Back</a>
      </div>
    </div>
  </form>
  </div>
</div>
@endsection
