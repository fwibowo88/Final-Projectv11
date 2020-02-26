@extends('layout.adminLayout')

@section('style')

@endsection

@section('script')

@endsection

@section('customScript')

@endsection

@section('titleBar','IIS | Master Extracurricular')

@section('pageTitle','Master Extracurricular')

@section('pageContent')
<div class="container-fluid">
  <div class="card card-primary">
    <div class="card-header">
      <div class="col-sm-10">
        <h2 class="card-title">Edit Master Extracurricular</h2>
      </div>
    </div>
    <!-- /.card-header -->
    <form role="form" action="{{route('extracurricular.update',$extracurricular->id)}}" method="post">
      {{method_field('PUT')}}
      {{csrf_field()}}
      <div class="card-body">
        <div class="form-group">
          <label>Extracurricular Name</label>
          <input type="text" class="form-control" name="extracurricularName" value="{{$extracurricular->name}}" required>
        </div>
        <div class="form-group">
          <label>Description</label>
          <textarea class="form-control" name="extracurricularDescription" rows="3">{{$extracurricular->description}}</textarea>
        </div>
        <div class="form-group">
          <label>Coach</label>
          <select class="form-control js-example-basic-single" name="extracurricularCoach" required>
            @foreach($coaches as $coach)
            @if($coach->id == $extracurricular->employee_id)
            <option value="{{$coach->id}}" selected>{{$coach->fname ." ".$coach->lname}}</option>
            @else
            <option value="{{$coach->id}}">{{$coach->fname ." ".$coach->lname}}</option>
            @endif
            @endforeach
          </select>
        </div>
      </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="btn-group float-right">
        <a class="btn btn-danger" href="{{route('extracurricular.index')}}">Cancel</a>
        <button type="submit" class="btn btn-primary" name="button"><i class="fa fa-save"></i> Save</button>
      </div>
    </div>
  </form>
  </div>
</div>
@endsection
