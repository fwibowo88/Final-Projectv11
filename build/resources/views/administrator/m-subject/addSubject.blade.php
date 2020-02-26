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
        <h2 class="card-title">Create Master Subject</h2>
      </div>
    </div>
    <!-- /.card-header -->
    <form role="form" action="{{route('subject.store')}}" method="post">
      @csrf
    <div class="card-body">
      <div class="form-group">
        <label>Subject Code</label>
        <input type="text" class="form-control" name="subjectCode" placeholder="MTK-TKJ-10" required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="subjectDescription" rows="3" placeholder="Subject Description . . . "></textarea>
      </div>
      <div class="form-group">
        <label>KKM</label>
        <input type="text" class="form-control" name="subjectMinPoint" placeholder="75.5" required>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="btn-group float-right">
        <a class="btn btn-danger" href="{{route('subject.index')}}">Cancel</a>
        <button type="submit" class="btn btn-primary" name="button"><i class="fa fa-save"></i> Save</button>
      </div>
    </div>
  </form>
  </div>
</div>
@endsection
