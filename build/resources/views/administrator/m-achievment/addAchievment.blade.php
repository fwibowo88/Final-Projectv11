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
        <h2 class="card-title">Create Master Achievment</h2>
      </div>
    </div>
    <!-- /.card-header -->
    <form role="form" action="{{route('achievment.store')}}" method="post">
      {{csrf_field()}}
    <div class="card-body">
      <div class="form-group">
        <label>Achievment Name</label>
        <input type="text" class="form-control" name="achievmentName" placeholder="Soccer Competition" required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="achievmentDescription" rows="3" placeholder="Achievment Description . . . "></textarea>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label>Point</label>
            <input type="number" class="form-control" name="achievmentPoint" min="0" required>
            <small>Min Value = 0</small>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label>Grade</label>
            <select class="form-control" name="achievmentGrade" required>
              <option value="city">City</option>
              <option value="province">Province</option>
              <option value="national">National</option>
              <option value="international">International</option>
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
