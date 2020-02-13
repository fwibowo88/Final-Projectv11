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
<script type="text/javascript">
$(document).ready(function(){
  $("#absentType").change(function(){
    var type = $( "#absentType option:selected" ).val();
    if(type == 'A' || type == 'L')
    {
      $("#absentEnd").prop("disabled", true);
    }
    else {
      $("#absentEnd").prop("disabled", false);
    }
  });
});
</script>
@endsection

@section('titleBar','IIS | Absent Record')

@section('pageTitle','Absent Record')

@section('pageContent')
<div class="container-fluid">
  <div class="card card-primary">
    <div class="card-header">
      <div class="col-sm-10">
        <h2 class="card-title">Create Absent Record</h2>
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
            <select class="form-control js-example-basic-single" name="absentStudent" required>
              @foreach($students as $student)
              <option value="{{$student->id}}">{{$student->nis."-".$student->fname ." ".$student->lname}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label>Type</label>
            <select class="form-control" id="absentType" name="absentType" required>
              <option value="" selected></option>
              <option value="A">A-Alpha</option>
              <option value="I">I-Permit</option>
              <option value="S">S-Sick</option>
              <option value="L">L-Late</option>
            </select>
            <small>A: Alpha | I: Ijin | S: Sakit | L: Terlambat</small>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label>Start Date</label>
            <input type="date" class="form-control" name="absentStDate" required>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label>End Date</label>
            <input type="date" class="form-control" id="absentEnd" name="absentEdDate">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="absentDescription" rows="3" placeholder="Absent Description . . . "></textarea>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="customFile">Custom File</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="btn-group float-right">
        <a class="btn btn-danger" href="{{route('absent-record.index')}}">Cancel</a>
        <button type="submit" class="btn btn-primary" name="button">Save</button>
      </div>
    </div>
  </form>
  </div>
</div>
@endsection
