@extends('layout.adminLayout')

@section('style')

@endsection

@section('script')

@endsection

@section('customScript')

@endsection

@section('titleBar','IIS | Master Academic Year')

@section('pageTitle','Master Academic Year')

@section('pageContent')
<div class="container-fluid">
  @if (session('status'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('status') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  <div class="card card-primary">
    <div class="card-header">
      <div class="col-sm-10">
        <h2 class="card-title">Create Master Academic Year</h2>
      </div>
    </div>
    <!-- /.card-header -->
    <form role="form" action="{{route('season.store')}}" method="post">
      {{csrf_field()}}
    <div class="card-body">
      <div class="form-group">
        <label>Code</label>
        <input type="text" class="form-control" name="yearName" placeholder="Ex : 2019/2020" value="{{ old('yearName') }}" required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="yearDescription" rows="3" placeholder="Academic Year Description . . . ">{{ old('yearDescription') }}</textarea>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label>Start Date</label>
            <input type="date" class="form-control" name="yearStDate" required>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label>End Date</label>
            <input type="date" class="form-control" name="yearEdDate" required>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label>Type</label>
        <select class="form-control" name="yearType" required>
          @if(old('yearType') == 'odd')
          <option value="odd" selected>Odd</option>
          <option value="even">Even</option>
          @else
          <option value="odd">Odd</option>
          <option value="even" selected>Even</option>
          @endif
        </select>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="btn-group float-right">
        <a class="btn btn-danger" href="{{route('season.index')}}">Cancel</a>
        <button type="submit" class="btn btn-primary" name="button"><i class="fa fa-save"></i> Save</button>
      </div>
    </div>
  </form>
  </div>
</div>
@endsection
