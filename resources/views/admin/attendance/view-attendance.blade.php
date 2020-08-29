@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Attendance</a> <a href="#" class="current">Add Attendance</a> </div>
    @if (Session::has('flash_message_error'))
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss='alert'></button>
                <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif
        @if (Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss='alert'></button>
                <strong>{!! session('flash_message_success') !!}</strong>
            </div>
        @endif
    <div class="card-header">
        <h3 class="card-title">Attendance List</h3>
        <a href="{{ route('admin.attendance') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-plus-circle">Add Attendance</i></a>
    </div>

  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Attendance</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($allData as $key=> $attend)
                   <tr class="gradeX">
                  <td class="text-center">{{ $key + 1 }}</td>
                  <td class="text-center">{{ date('d-m-Y', strtotime($attend->date)) }}</td>
                  <td class="text-center">
                    <a href="{{ url('/admin/attend/edit/'.$attend->date) }}" class="btn btn-primary btn-mini"><i class="fa fa-edit">  Edit</i> </a>
                    <a href="{{ url('/admin/attend/details/'.$attend->date) }}" class="btn btn-info btn-mini"><i class="fa fa-eye">  Details</i> </a>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
