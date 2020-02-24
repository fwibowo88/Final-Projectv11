@extends('layout.admissionLayout')

@section('style')

@endsection

@section('script')

@endsection

@section('customScript')

@endsection

@section('titleBar','IIS | Admission')

@section('pageContent')
<div class="row">
  <div class="col-6">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.8553038720456!2d112.7198596142794!3d-7.257303894761471!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f95200769ba9%3A0xa4ae9bdcba1a2af3!2sCatholic%20Vocational%20High%20School%20of%20St.%20Louis%20Surabaya!5e0!3m2!1sen!2sid!4v1582516315255!5m2!1sen!2sid"
    width="550px" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
  </div>
  <div class="col-6">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="card-title"><b>Contact Us</b></h5>
      </div>
      <div class="card-body">
        <p class="card-text">
          <div class="form-group">
            <label>Address</label>
            <p>Jl. Tidar No.117, Petemon, Kec. Sawahan, Kota SBY, Jawa Timur 60252</p>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label>Email</label>
                <p>info[at]smkstlouis.sch.id</p>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label>Phone</label>
                <p>(031) 5311277</p>
              </div>
            </div>
          </div>
          <p><b>Office Hour</b></p>
          <div class="row">
            <div class="col-6">
              <p>Senin - Jumat</p>
              <p>Sabtu</p>
            </div>
            <div class="col-6">
              <p>08:00-15:00</p>
              <p>08:00-13:00</p>
            </div>
          </div>
        </p>
      </div>
      <div class="card-footer">
        <div class="float-right">
          <a href="#" class="card-link">Call</a>
          <a href="#" class="card-link">Email</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
