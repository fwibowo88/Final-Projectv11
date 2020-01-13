@extends('layout.adminLayout')

@section('style')

@endsection

@section('script')

@endsection

@section('customScript')

@endsection

@section('titleBar','IIS | Master Subject')

@section('pageTitle','Master Subject')

@section('pageContent')
<div class="container-fluid">
  <div class="card card-primary">
    <div class="card-header">
      <div class="col-sm-10">
        <h2 class="card-title">Edit Master Subject</h2>
      </div>
    </div>
    <!-- /.card-header -->
    <form role="form" action="{{route('subject.update',$subject->id)}}" method="post">
      @csrf
      {{method_field('PUT')}}
    <div class="card-body">
      <div class="form-group">
        <label>Subject Code</label>
        <input type="text" class="form-control" name="subjectCode" value="{{$subject->code}}" required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="subjectDescription" rows="3">{{$subject->description}}</textarea>
      </div>
      <div class="form-group">
        <label>KKM</label>
        <input type="text" class="form-control" name="subjectMinPoint" value="{{$subject->min_Point}}" required>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="btn-group float-right">
        <a class="btn btn-danger" href="{{route('subject.index')}}">Cancel</a>
        <button type="submit" class="btn btn-primary" name="button">Save</button>
      </div>
    </div>
  </form>
  </div>
</div>
@endsection
