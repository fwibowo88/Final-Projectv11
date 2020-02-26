@extends('layout.adminLayout')

@section('style')

@endsection

@section('script')

@endsection

@section('customScript')

@endsection

@section('titleBar','IIS | Master Achievment')

@section('pageTitle','Master Achievment')

@section('pageContent')
<div class="container-fluid">
  <div class="card card-primary">
    <div class="card-header">
      <div class="col-sm-10">
        <h2 class="card-title">Edit Master Achievment</h2>
      </div>
    </div>
    <!-- /.card-header -->
    <form role="form" action="{{route('achievment.update',$achievment->id)}}" method="post">
      {{method_field('PUT')}}
      {{csrf_field()}}
    <div class="card-body">
      <div class="form-group">
        <label>Achievment Name</label>
        <input type="text" class="form-control" name="achievmentName" value="{{$achievment->name}}" required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="achievmentDescription" rows="3">{{$achievment->description}}</textarea>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label>Point</label>
            <input type="number" class="form-control" name="achievmentPoint" min="0" value="{{$achievment->point}}" required>
            <small>Min Value = 0</small>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label>Grade</label>
            <select class="form-control" name="achievmentGrade" required>
              @if($achievment->grade == 'city')
              <option value="city" selected>City</option>
              <option value="province">Province</option>
              <option value="national">National</option>
              <option value="international">International</option>
              @elseif($achievment->grade == 'province')
              <option value="city">City</option>
              <option value="province" selected>Province</option>
              <option value="national">National</option>
              <option value="international">International</option>
              @elseif($achievment->grade == 'national')
              <option value="city">City</option>
              <option value="province">Province</option>
              <option value="national" selected>National</option>
              <option value="international">International</option>
              @else
              <option value="city">City</option>
              <option value="province">Province</option>
              <option value="national">National</option>
              <option value="international" selected>International</option>
              @endif
            </select>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="btn-group float-right">
        <a class="btn btn-danger" href="{{route('achievment.index')}}">Cancel</a>
        <button type="submit" class="btn btn-primary" name="button"><i class="fa fa-save"></i> Save</button>
      </div>
    </div>
  </form>
  </div>
</div>
@endsection
