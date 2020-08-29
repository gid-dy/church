@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Service Types</a> <a href="#" class="current">View Service Types</a> </div>
    <h1>Service Types</h1>
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
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Service Types</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Service Type ID</th>
                  <th>Service Type Name</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($service_type as $service_type)
                   <tr class="gradeX">
                  <td>{{ $service_type->id }}</td>
                  <td>{{ $service_type->service_type }}</td>
                  <td class="center">
                    <a href="{{ url('/admin/edit-service_type/'.$service_type->id) }}" class="btn btn-primary btn-mini">Edit</a>
                    <a rel={{ "$service_type->id" }} rel1="delete-service_type" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a>
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
