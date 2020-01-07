@extends('layout.adminLayout')

@section('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection

@section('script')
<!-- DataTables -->
<script src="{{asset('asset/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
@endsection

@section('customScript')
<script>
  $(function () {
    $("#example1").DataTable();
    });
</script>
@endsection

@section('titleBar','IIS | Master Bank')

@section('pageTitle','Master Bank')

@section('pageContent')
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">All Master Bank in Database</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr class="text-center">
          <th>#</th>
          <th>Bank Name</th>
          <th>Description</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>1</td>
          <td>BCA</td>
          <td>Bank Central Asia</td>
          <td>
            <div class="btn-group">
              <a class="btn btn-primary" href="#">AA</a>
              <a class="btn btn-warning" href="#">BB</a>
              <a class="btn btn-danger" href="#">CC</a>
            </div>
          </td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
          <th>#</th>
          <th>Bank Name</th>
          <th>Description</th>
          <th>Action</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
</div>
@endsection
