@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Bible Classes</a> <a href="#" class="current">View Bible Classes</a> </div>
    <h1>Titles</h1>
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
            <h5>View Bible Classes</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Bible Class ID</th>
                  <th>Bible Class Name</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($class as $class)
                   <tr class="gradeX">
                  <td>{{ $class->id }}</td>
                  <td>{{ $class->class_name }}</td>
                  <td class="center">
                    <a href="{{ url('/admin/edit-class/'.$class->id) }}" class="btn btn-primary btn-mini">Edit</a>
                    <a rel={{ "$class->id" }} rel1="delete-class" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a>
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
