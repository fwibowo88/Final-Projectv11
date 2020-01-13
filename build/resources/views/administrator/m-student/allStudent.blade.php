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

@section('titleBar','IIS | Master Student')

@section('pageTitle','Master Student')

@section('pageContent')
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">All Master Student in Database</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr class="text-center">
          <th>#</th>
          <th>Photo</th>
          <th>NIK</th>
          <th>Full Name</th>
          <th>Email</th>
          <th>Class</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>1</td>
          <td class="text-center"><img src="{{asset('asset/dist/img/user2-160x160.jpg')}}" height="50px" width="50px" alt="profile"></td>
          <td>12345678</td>
          <td>Fernando Wibowo</td>
          <td>fernando@smkstlouis.sch.id</td>
          <td>X TKJ 1</td>
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
          <th>Photo</th>
          <th>NIK</th>
          <th>Full Name</th>
          <th>Email</th>
          <th>Class</th>
          <th>Action</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
</div>
@endsection
