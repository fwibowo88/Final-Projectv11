@extends('layout.adminLayout')

@section('style')
<!-- Select2 -->
  <link rel="stylesheet" href="{{asset('asset/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection

@section('script')
<!-- Select2 -->
<script src="{{asset('asset/plugins/select2/js/select2.full.min.js')}}"></script>
@endsection

@section('customScript')
<script type="text/javascript">
$(document).ready(function() {
  $('.js-example-basic-single').select2();
});
</script>
@endsection

@section('titleBar','IIS | Master Complaint')

@section('pageTitle','Master Complaint')

@section('pageContent')
<div class="container-fluid">
  <div class="card card-primary">
    <div class="card-header">
      <div class="col-sm-10">
        <h2 class="card-title">Edit Master Complaint</h2>
      </div>
    </div>
    <!-- /.card-header -->
    <form role="form" action="{{route('complaint.update',$complaint->id)}}" method="post">
      {{method_field('PUT')}}
      {{csrf_field()}}
    <div class="card-body">
      <div class="form-group">
        <label>Topic</label>
        <input type="text" class="form-control" name="complaintName" value="{{$complaint->name}}" required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="complaintDescription" rows="3">{{$complaint->description}}</textarea>
      </div>
      <div class="form-group">
        <label>Department</label>
        <select class="js-example-basic-single form-control" name="complaintDepartment" required>
          @foreach($departments as $department)
          @if($department->id == $complaint->department_id)
          <option value="{{$department->id}}" selected>{{$department->name}}</option>
          @else
          <option value="{{$department->id}}" >{{$department->name}}</option>
          @endif
          @endforeach
        </select>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="btn-group float-right">
        <a class="btn btn-danger" href="{{route('complaint.index')}}">Cancel</a>
        <button type="submit" class="btn btn-primary" name="button"><i class="fa fa-save"></i> Save</button>
      </div>
    </div>
  </form>
  </div>
</div>
@endsection
