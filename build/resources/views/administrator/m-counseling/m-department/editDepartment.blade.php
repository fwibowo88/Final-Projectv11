@extends('layout.adminLayout')

@section('style')

@endsection

@section('script')

@endsection

@section('customScript')

@endsection

@section('titleBar','IIS | Master Department')

@section('pageTitle','Master Department')

@section('pageContent')
<div class="container-fluid">
  <div class="card card-primary">
    <div class="card-header">
      <div class="col-sm-10">
        <h2 class="card-title">Edit Master Department</h2>
      </div>
    </div>
    <!-- /.card-header -->
    <form role="form" action="{{route('department.update',$department->id)}}" method="post">
    {{method_field('PUT')}}
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label>Department Name</label>
        <input type="text" class="form-control" name="departmentName" value="{{$department->name}}" required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="departmentDescription" rows="3">{{$department->description}}</textarea>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="btn-group float-right">
        <a class="btn btn-danger" href="{{route('department.index')}}">Cancel</a>
        <button type="submit" class="btn btn-primary" name="button">Save</button>
      </div>
    </div>
    </form>
  </div>
</div>
@endsection
