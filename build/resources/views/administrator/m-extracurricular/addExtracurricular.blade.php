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

@section('titleBar','IIS | Master Extracurricular')

@section('pageTitle','Master Extracurricular')

@section('pageContent')
<div class="container-fluid">
  <div class="card card-primary">
    <div class="card-header">
      <div class="col-sm-10">
        <h2 class="card-title">Create Master Extracurricular</h2>
      </div>
    </div>
    <!-- /.card-header -->
    <form role="form" action="{{route('extracurricular.store')}}" method="post">
      {{csrf_field()}}
    <div class="card-body">
      <div class="form-group">
        <label>Extracurricular Name</label>
        <input type="text" class="form-control" name="extracurricularName" placeholder="Ex : Badminton" required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="extracurricularDescription" rows="3" placeholder="Extracurricular Description . . . "></textarea>
      </div>
      <div class="form-group">
        <label>Coach</label>
        <select class="form-control js-example-basic-single" name="extracurricularCoach" required>
          @foreach($coaches as $coach)
          <option value="{{$coach->id}}">{{$coach->fname ." ".$coach->lname}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="btn-group float-right">
        <a class="btn btn-danger" href="{{route('extracurricular.index')}}">Cancel</a>
        <button type="submit" class="btn btn-primary" name="button">Save</button>
      </div>
    </div>
  </form>
  </div>
</div>
@endsection
