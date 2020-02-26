@extends('layout.adminLayout')

@section('style')

@endsection

@section('script')

@endsection

@section('customScript')

@endsection

@section('titleBar','IIS | Master Violation')

@section('pageTitle','Master Violation')

@section('pageContent')
<div class="container-fluid">
  <div class="card card-primary">
    <div class="card-header">
      <div class="col-sm-10">
        <h2 class="card-title">Edit Master Violation</h2>
      </div>
    </div>
    <!-- /.card-header -->
    <form role="form" action="{{route('violation.update',$violation->id)}}" method="post">
      {{method_field('PUT')}}
      {{csrf_field()}}
    <div class="card-body">
      <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="violationName" value="{{$violation->name}}" required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="violationDescription" rows="3">{{$violation->description}}</textarea>
      </div>
      <div class="form-group">
        <label>Point</label>
        <input type="text" class="form-control" name="violationPoint" value="{{$violation->point}}" required>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="btn-group float-right">
        <a class="btn btn-danger" href="{{route('violation.index')}}">Cancel</a>
        <button type="submit" class="btn btn-primary" name="button"><i class="fa fa-save"></i> Save</button>
      </div>
    </div>
  </form>
  </div>
</div>
@endsection
