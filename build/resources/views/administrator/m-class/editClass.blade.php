@extends('layout.adminLayout')

@section('style')

@endsection

@section('script')

@endsection

@section('customScript')

@endsection

@section('titleBar','IIS | Master Class')

@section('pageTitle','Master Class')

@section('pageContent')
<div class="container-fluid">
  <div class="card card-primary">
    <div class="card-header">
      <div class="col-sm-10">
        <h2 class="card-title">Edit Master Class</h2>
      </div>
    </div>
    <!-- /.card-header -->
    <form role="form" action="{{route('class.update',$class->id)}}" method="post">
      {{method_field('PUT')}}
      {{csrf_field()}}
      <div class="card-body">
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label>Program</label>
              <select class="form-control js-example-basic-single" name="classProgram" required>
                @foreach($programs as $program)
                @if($program->id == $class->program_id)
                <option value="{{$program->id}}" selected>{{$program->name}}</option>
                @else
                <option value="{{$program->id}}">{{$program->name}}</option>
                @endif
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label>Guardian</label>
              <select class="form-control js-example-basic-single" name="classTeacher" required>
                @foreach($teachers as $teacher)
                @if($teacher->id == $class->employee_id)
                <option value="{{$teacher->id}}" selected>{{$teacher->fname ." ".$teacher->lname}}</option>
                @else
                <option value="{{$teacher->id}}">{{$teacher->fname ." ".$teacher->lname}}</option>
                @endif
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>Class Name</label>
          <input type="text" class="form-control" name="className" value="{{$class->name}}" required>
        </div>
        <div class="form-group">
          <label>Description</label>
          <textarea class="form-control" name="classDescription" rows="3">{{$class->description}}</textarea>
        </div>
      </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="btn-group float-right">
        <a class="btn btn-danger" href="{{route('class.index')}}">Cancel</a>
        <button type="submit" class="btn btn-primary" name="button">Save</button>
      </div>
    </div>
  </form>
  </div>
</div>
@endsection
