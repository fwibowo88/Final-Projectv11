@extends('layout.adminLayout')

@section('style')
<!-- Ekko Lightbox -->
<link rel="stylesheet" href="{{asset('asset/plugins/ekko-lightbox/ekko-lightbox.css')}}">
@endsection

@section('script')
<!-- Ekko Lightbox -->
<script src="{{asset('asset/plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
@endsection

@section('customScript')
<script type="text/javascript">
$(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });
  })
</script>
@endsection

@section('titleBar','IIS | Absent Record')

@section('pageTitle','Absent Record')

@section('pageContent')
<div class="container-fluid">
  <div class="card card-primary">
    <div class="card-header">
      <div class="col-sm-10">
        <h2 class="card-title">View Absent Record</h2>
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
            <label>Custom File</label>
            <p class="text-center"><a href="{{asset('system-data/students/'.$absent->student->id.'/transaction/'.'abs-'.date('dmY',strtotime($absent->start_date)).'.png')}}" data-toggle="lightbox">
              <img height="75" width="75" src="{{asset('system-data/students/'.$absent->student->id.'/transaction/'.'abs-'.date('dmY',strtotime($absent->start_date)).'.png')}}" alt="absent-receipt">
            </a></p>
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
