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

@section('titleBar','IIS | Master employee')

@section('pageTitle','Master employee')

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
        <h3 class="card-title">All Master Employee in Database</h3>
      </div>
      <div class="col-sm-1 float-right">
        <a class="btn btn-primary" href="{{route('employee.create')}}">Add Data</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr class="text-center">
          <th>#</th>
          <th>NIK</th>
          <th>Full Name</th>
          <th>Department</th>
          <th>Email</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$employee->nik}}</td>
          <td>{{$employee->fname ." ".$employee->lname}}</td>
          <td>@foreach($employee->department as $department)
            <span class="badge badge-info">{{$department->name}}</span>
            @endforeach</td>
          <td>{{$employee->email}}</td>
          @if($employee->status == 'active')
          <td><span class="badge badge-success">{{ucfirst($employee->status)}}</span></td>
          @else
          <td><span class="badge badge-danger">{{ucfirst($employee->status)}}</span></td>
          @endif
          <td>
            <form role="form" action="{{route('employee.destroy',$employee->id)}}" method="POST">
              {{csrf_field()}}
              {{method_field('DELETE')}}
              <div class="btn-group">
                @if($employee->status == 'active')
                <a class="btn btn-primary" href="{{route('employee.edit',$employee->id)}}"><i class="fa fa-edit"></i></a>
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
          <th>NIK</th>
          <th>Full Name</th>
          <th>Department</th>
          <th>Email</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
</div>
@endsection
