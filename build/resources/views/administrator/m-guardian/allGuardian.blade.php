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

@section('titleBar','IIS | Master guardian')

@section('pageTitle','Master guardian')

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
        <h3 class="card-title">All Master Guardian in Database</h3>
      </div>
      <div class="col-sm-1 float-right">
        <a class="btn btn-primary" href="{{route('guardian.create')}}">Add Data</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr class="text-center">
          <th>#</th>
          <th>Name</th>
          <th>Student-NIS</th>
          <th>Relation</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($guardians as $guardian)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$guardian->fname." ".$guardian->lname}}</td>
          <td><a href="{{route('student.show',$guardian->student->id)}}">{{$guardian->student->fname." ".$guardian->student->lname}}</a></td>
          <td>{{ucfirst($guardian->relation)}}</td>
          <td>
            <form role="form" action="{{route('guardian.destroy',$guardian->id)}}" method="POST">
              {{csrf_field()}}
              {{method_field('DELETE')}}
              <div class="btn-group">
                <a class="btn btn-primary" href="{{route('guardian.edit',$guardian->id)}}"><i class="fa fa-edit"></i></a>
                <a class="btn btn-info" href="{{route('guardian.show',$guardian->id)}}"><i class="fa fa-eye"></i></a>
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
          <th>Student-NIS</th>
          <th>Relation</th>
          <th>Action</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
</div>
@endsection
