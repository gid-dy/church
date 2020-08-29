@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Marks</a> <a href="#" class="current">Add Marks</a> </div>
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
        <h3 class="card-title">Marks List</h3>
        <a href="{{ url('admin/marks') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-plus-circle">Add Marks</i></a>
    </div>

  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Marks</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Service</th>
                  <th>Month</th>
                  <th>Year</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($allData as $key=> $attend)
                   <tr class="gradeX">
                  <td class="text-center">{{ $key + 1 }}</td>
                  <td class="text-center">{{ $attend->service_id }}</td>
                  <td class="text-center">{{ $attend->month_id }}</td>
                  <td class="text-center">{{ $attend->year_id }}</td>
                  <td class="text-center">
                    <a href="{{ url('/admin/mark/edit/'.$attend->month_id) }}" class="btn btn-primary btn-mini"><i class="fa fa-edit">  Edit</i> </a>
                    <a href="{{ url('/admin/mark/details/'.$attend->month_id) }}" class="btn btn-info btn-mini"><i class="fa fa-eye">  Details</i> </a>
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
