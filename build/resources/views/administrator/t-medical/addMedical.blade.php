@extends('layout.adminLayout')

@section('style')

@endsection

@section('script')

@endsection

@section('customScript')

@endsection

@section('titleBar','IIS | Master Bank')

@section('pageTitle','Master Bank')

@section('pageContent')
<div class="container-fluid">
  <div class="card card-primary">
    <div class="card-header">
      <div class="col-sm-10">
        <h2 class="card-title">Create Master Bank</h2>
      </div>
    </div>
    <!-- /.card-header -->
    <form role="form" action="{{route('bank.store')}}" method="post">
      {{csrf_field()}}
    <div class="card-body">
      <div class="form-group">
        <label>Bank Name</label>
        <input type="text" class="form-control" name="bankName" placeholder="Ex : BCA" required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="bankDescription" rows="3" placeholder="Bank Description . . . "></textarea>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="btn-group float-right">
        <a class="btn btn-danger" href="{{route('bank.index')}}">Cancel</a>
        <button type="submit" class="btn btn-primary" name="button">Save</button>
      </div>
    </div>
  </form>
  </div>
</div>
@endsection
