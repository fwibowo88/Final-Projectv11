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
        <h3 class="card-title">All Master Student in Database</h3>
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
          <th>NIS</th>
          <th>Photo</th>
          <th>Student Name</th>
          <th>Class</th>
          <th>Program</th>
          <th>Guardian</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$student->nis}}</td>
          <td class="text-center"><img src="{{asset('app-data/student/photo/s_img-').$student->nik}}" height="40" width="40" alt="s_img{{$student->nik}}"></td>
          <td>{{$student->fname ." ".$student->lname}}</td>
          <td>$student->grade->name</td>
          <td>$student->program->name</td>
          @if($student->status == 'active')
          <td><span class="badge badge-success">{{ucfirst($student->status)}}</span></td>
          @else
          <td><span class="badge badge-warning">{{ucfirst($student->status)}}</span></td>
          @endif
          <td>{{$student->guardians[0]->fname." ".$student->guardians[0]->lname}}</td>
          <td>
            <form role="form" action="{{route('student.destroy',$student->id)}}" method="POST">
              {{csrf_field()}}
              {{method_field('DELETE')}}
              <div class="btn-group">
                @if($student->status == 'active')
                <a class="btn btn-primary" href="{{route('student.edit',$student->id)}}"><i class="fa fa-edit"></i></a>
                <a class="btn btn-warning" href="{{route('student.show',$student->id)}}"><i class="fa fa-eye"></i></a>
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                @else
                <a class="btn btn-secondary" href="#"><i class="fa fa-edit"></i></a>
                <a class="btn btn-secondary" href="#"><i class="fa fa-eye"></i></a>
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
          <th>NIS</th>
          <th>Photo</th>
          <th>Student Name</th>
          <th>Class</th>
          <th>Program</th>
          <th>Guardian</th>
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
