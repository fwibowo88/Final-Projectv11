@extends('layout.adminLayout')

@section('style')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('asset/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection

@section('script')
<!-- Select2 -->
<script src="{{asset('asset/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('asset/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
@endsection

@section('customScript')
<script type="text/javascript">
$(document).ready(function() {
  $('.js-example-basic-single').select2();
});
</script>

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
  <!-- Filter-Card -->
  <div class="card card-primary collapsed-card">
    <div class="card-header">
      <h3 class="card-title">Filter</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
        </button>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <form role="form" action="{{route('absent-record.filter')}}" method="get">
        <div class="row">
          <div class="col-2">
            <div class="form-group">
              <input class="form-control" type="date" name="absentFilterStDate" value="">
              <small><b>Start Date</b></small>
            </div>
          </div>
          <div class="col-2">
            <div class="form-group">
              <input class="form-control" type="date" name="absentFilterEdDate" value="">
              <small><b>End Date</b></small>
            </div>
          </div>
          <div class="col-2">
            <div class="form-group">
              <select class="js-example-basic-single form-control" name="absentFilterSt-ID">
                @foreach($students as $student)
                <option value="{{$student->id}}">{{$student->nis."-".$student->fname." ".$student->lname}}</option>
                @endforeach
              </select>
              <small><b>Student-ID</b></small>
            </div>
          </div>
          <div class="col-2">
            <div class="form-group">
              <select class="form-control" name="absentFilterType">
                <option value="A">Absent</option>
                <option value="I">Permit (Ijin)</option>
                <option value="S">Sick (Sakit)</option>
                <option value="L">Late (Terlambat)</option>
              </select>
              <small><b>Type</b></small>
            </div>
          </div>
          <div class="col-2">
            <div class="form-group">
              <select class="js-example-basic-single form-control" name="absentFilterYear">
                @foreach($years as $year)
                <option value="{{$year->id}}">{{$year->name."-".ucfirst($year->type)}}</option>
                @endforeach
              </select>
              <small><b>Academic Year</b></small>
            </div>
          </div>
          <div class="col-2">
            <div class="form-group">
              <button class="btn btn-primary" type="submit" name="button"><i class="fa fa-search"></i> Filter</button>
              <a class="btn btn-danger" href="{{route('absent-record.index')}}"><i class="fa fa-sync"></i> Reset</a>
            </div>
          </div>
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- Filter-Card -->
  <div class="card card-primary card-outline">
    <div class="card-header">
      <div class="col-sm-10">
        <h3 class="card-title">All Absent Record in Database</h3>
      </div>
      <div class="col-sm-1 float-right">
        <a class="btn btn-primary" href="{{route('absent-record.create')}}">Add Record</a>
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
