@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content" class="col-lg-12">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Second Service</a> <a href="#" class="current">View Second Service</a> </div>
    <h1>Second Service</h1>
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
    {{-- <div style="margin-left:20px;">
        <a href="{{ url('/admin/export-users') }}" class="btn btn-primary btn-mini">Export</a>
    </div> --}}
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Second Service</h5>
          </div>

          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>Adult Id</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Service Type</th>
                        <th>Bible Class</th>
                        <th>Resident</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($secondservices as $secondservice)

                            @if($secondservice->service_type == "Second Service")
                            <tr class="gradeX">
                            <td class="center">{{ $secondservice->id }}</td>
                            <td class="center">
                                @if(!empty($secondservice->image))
                                    <img src="{{ asset ('/images/backend_images/adults/'.$secondservice->image) }}" style= "width:70px;">
                                @endif
                            </td>
                            <td class="center">{{ $secondservice->title }}</td>
                            <td class="center">{{ $secondservice->surname }} {{ $secondservice->othernames }}</td>
                            <td class="center">{{ $secondservice->contact_1 }}</td>
                            <td class="center">{{ $secondservice->service_type }}</td>
                            <td class="center">{{ $secondservice->bibleclass }}</td>
                            <td class="center">{{ $secondservice->resident }}</td>
                            <td class="center">
                                <a target="_blank" href="{{ url('admin/view-adult_secondservice/'.$secondservice->id) }}"  class="btn btn-success btn-mini">details</a>
                                <a rel="{{ $secondservice->id }}" rel1="delete-adult_second-service" <?php /*href="{{ url('/admin/delete-adult_second-service/'.$secondservice->id) }}" */?> href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                            </td>
                            @endif
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
