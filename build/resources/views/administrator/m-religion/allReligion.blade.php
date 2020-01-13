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

@section('titleBar','IIS | Master Religion')

@section('pageTitle','Master Religion')

@section('pageContent')
<div class="container-fluid">
  @if (session('status'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('status') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  <div class="card card-primary card-outline">
    <div class="card-header">
      <div class="col-sm-10">
        <h3 class="card-title">All Master Religion in Database</h3>
      </div>
      <div class="col-sm-1 float-right">
        <button type="button" class="btn btn-primary" name="button">Add Data</button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr class="text-center">
          <th>#</th>
          <th>Name</th>
          <th>Description</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($religions as $religion)
        <tr>
          <td>{{$religion->id}}</td>
          <td>{{$religion->name}}</td>
          <td>{{$religion->description}}</td>
          <td>
            <form role="form" action="{{route('religion.destroy',$religion->id)}}" method="POST">
              {{csrf_field()}}
              {{method_field('DELETE')}}
              <div class="btn-group">
                @if($religion->status == 'active')
                <a class="btn btn-primary" href="{{route('religion.edit',$religion->id)}}"><i class="fa fa-edit"></i></a>
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                @else
                <a class="btn btn-secondary" href="#"><i class="fa fa-edit"></i></a>
                <button type="submit" class="btn btn-success"><i class="fa fa-undo"></i></button>
                @endif
              </div>
            </form>
          </td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
          <th>#</th>
          <th>Name</th>
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
