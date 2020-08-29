@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content" class="col-lg-12">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Admins</a> <a href="#" class="current">View Admins</a> </div>
    <h1>Admins</h1>
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
            <h5>Admins</h5>
          </div>

          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th style="text-align:left">Id</th>
                        <th style="text-align:left">Name</th>
                        <th style="text-align:left">Email</th>
                        <th style="text-align:left">Status</th>
                        <th style="text-align:left">Created on</th>
                        <th style="text-align:left">Updated on</th>
                        <th style="text-align:left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)

                        <tr class="gradeX">
                            <td class="center">{{ $admin->id }}</td>
                            <td class="center">{{ $admin->name }}</td>
                            <td class="center">{{ $admin->email }}</td>
                            <td class="center">
                                @if($admin->status==1)
                                    <span class="btn btn-success btn-mini">Active</span>
                                @else
                                    <span class="btn btn-danger btn-mini">Inactive</span>
                                @endif
                            </td>
                            <td class="center">{{ $admin->created_at }}</td>
                            <td class="center">{{ $admin->updated_at }}</td>
                            <td class="center">
                                <a href="{{ url('/admin/edit-admin/'.$admin->id) }} " class="btn btn-primary btn-mini">Edit</a>
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
