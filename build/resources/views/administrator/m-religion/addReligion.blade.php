@extends('layout.adminLayout')

@section('style')

@endsection

@section('script')

@endsection

@section('customScript')

@endsection

@section('titleBar','IIS | Master Religion')

@section('pageTitle','Master Religion')

@section('pageContent')
<div class="container-fluid">
  <div class="card card-primary">
    <div class="card-header">
      <div class="col-sm-10">
        <h2 class="card-title">Create Master Religion</h2>
      </div>
    </div>
    <form role="form" action="{{route('religion.store')}}" method="post">
    @csrf
    <!-- /.card-header -->
    <div class="card-body">
      <div class="form-group">
        <label>Religion Name</label>
        <input type="text" class="form-control" name="religionName" placeholder="Ex : Christian" required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="religionDescription" rows="3" placeholder="Religion Description . . . "></textarea>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="btn-group float-right">
        <a class="btn btn-danger" href="{{route('religion.index')}}">Cancel</a>
        <button type="submit" class="btn btn-primary" name="button">Save</button>
      </div>
    </div>
    </form>
  </div>
</div>
@endsection
