@extends('layout.adminLayout')

@section('style')

@endsection

@section('script')

@endsection

@section('customScript')

@endsection

@section('titleBar','IIS | Master Program')

@section('pageTitle','Master Program')

@section('pageContent')
<div class="container-fluid">
  <div class="card card-primary">
    <div class="card-header">
      <div class="col-sm-10">
        <h2 class="card-title">Create Master Program</h2>
      </div>
    </div>
    <form role="form" action="{{route('program.update',$program->id)}}" method="post">
    @csrf
    {{method_field('PUT')}}
    <!-- /.card-header -->
    <div class="card-body">
      <div class="form-group">
        <label>Program Name</label>
        <input type="text" class="form-control" name="programName" value="{{$program->name}}" required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="programDescription" rows="3">{{$program->description}}</textarea>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="btn-group float-right">
        <a class="btn btn-danger" href="{{route('program.index')}}">Cancel</a>
        <button type="submit" class="btn btn-primary" name="button">Save</button>
      </div>
    </div>
    </form>
  </div>
</div>
@endsection
