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

@section('titleBar','IIS | Absent Record')

@section('pageTitle','Absent Record')

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
        <h3 class="card-title">All Absent Record in Database</h3>
      </div>
      <div class="col-sm-1 float-right">
        <button type="button" class="btn btn-primary" name="button">Add Record</button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr class="text-center">
          <th>#</th>
          <th>Start Date</th>
          <th>Student Name-NIS</th>
          <th>Type</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($absents as $absent)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$absent->start_date}}</td>
          <td>{{$absent->student->fname ." ".$absent->student->lname." - ".$absent->student->nis}}</td>
          <td class="text-center">{{$absent->type}}</td>
          @if($absent->status == 'confirmed')
          <td><span class="badge badge-success">{{ucfirst($absent->status)}}</span></td>
          @else
          <td><span class="badge badge-warning">{{ucfirst($absent->status)}}</span></td>
          @endif
          <td>
            <form role="form" action="{{route('absent-record.destroy',$absent->id)}}" method="POST">
              {{csrf_field()}}
              {{method_field('DELETE')}}
              <div class="btn-group">
                @if($absent->status == 'pending')
                <a class="btn btn-success" href="{{route('absent-record.confirmed',$absent->id)}}"><i class="fa fa-check"></i></a>
                <a class="btn btn-primary" href="{{route('absent-record.edit',$absent->id)}}"><i class="fa fa-edit"></i></a>
                <a class="btn btn-info" href="{{route('absent-record.show',$absent->id)}}"><i class="fa fa-eye"></i></a>
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                @else
                <a class="btn btn-success"><i class="fa fa-check"></i></a>
                <a class="btn btn-primary"><i class="fa fa-edit"></i></a>
                <a class="btn btn-info" href="{{route('absent-record.show',$absent->id)}}"><i class="fa fa-eye"></i></a>
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
          <th>Start Date</th>
          <th>Student Name-NIS</th>
          <th>Type</th>
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
