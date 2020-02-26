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

@section('titleBar','IIS | Master Class')

@section('pageTitle','Master Class')

@section('pageContent')
<div class="container-fluid">
  <div class="card card-primary">
    <div class="card-header">
      <div class="col-sm-10">
        <h2 class="card-title">Create Master Class</h2>
      </div>
    </div>
    <!-- /.card-header -->
    <form role="form" action="{{route('class.store')}}" method="post">
      {{csrf_field()}}
    <div class="card-body">
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label>Program</label>
            <select class="form-control js-example-basic-single" name="classProgram" required>
              @foreach($programs as $program)
              <option value="{{$program->id}}">{{$program->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label>Guardian</label>
            <select class="form-control js-example-basic-single" name="classTeacher" required>
              @foreach($teachers as $teacher)
              <option value="{{$teacher->id}}">{{$teacher->fname ." ".$teacher->lname}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label>Class Name</label>
        <input type="text" class="form-control" name="className" placeholder="Ex : 10 TKJ 1" required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="classDescription" rows="3" placeholder="Class Description . . . "></textarea>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="btn-group float-right">
        <a class="btn btn-danger" href="{{route('class.index')}}">Cancel</a>
        <button type="submit" class="btn btn-primary" name="button"><i class="fa fa-save"></i> Save</button>
      </div>
    </div>
  </form>
  </div>
</div>
@endsection
