@extends('layout.adminLayout')

@section('style')

@endsection

@section('script')

@endsection

@section('customScript')

@endsection

@section('titleBar','IIS | Master Billing')

@section('pageTitle','Master Billing')

@section('pageContent')
<div class="container-fluid">
  <div class="card card-primary">
    <div class="card-header">
      <div class="col-sm-10">
        <h2 class="card-title">Create Master Billing</h2>
      </div>
    </div>
    <!-- /.card-header -->
    <form role="form" action="{{route('billing-Item.store')}}" method="post">
      {{csrf_field()}}
    <div class="card-body">
      <div class="form-group">
        <label>Item Name</label>
        <input type="text" class="form-control" name="billingName" placeholder="Ex : SPP" required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="billingDescription" rows="3" placeholder="Billing Item Description . . . "></textarea>
      </div>
      <div class="form-group">
        <label>Price</label>
        <input type="number" class="form-control" name="billingPrice" min="0" required>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="btn-group float-right">
        <a class="btn btn-danger" href="{{route('billing-Item.index')}}">Cancel</a>
        <button type="submit" class="btn btn-primary" name="button">Save</button>
      </div>
    </div>
  </form>
  </div>
</div>
@endsection
