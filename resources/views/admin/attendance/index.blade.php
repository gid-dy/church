
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
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="list-style-type:none;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Attendance</h5>
          </div>
          <div class="row">
            <div class="col-md-6 offset-md-3">
                    <table class="table">
                            <form action="{{ route('admin.attendance') }}" method="POST" class="form-control">
                               @csrf
                                <tr>
                                    <td>Select Class</td>
                                    <td>
                                        <select name="service_id" id="" class="form-control">
                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->service_type }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" value="Select" class="btn btn-primary btn-block"></td>
                                </tr>
                            </form>
                        </table>
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>





@endsection
@section('singlePageScript')
    <script>
         $(document).ready( function() {
            var now = new Date();
            var month = (now.getMonth() + 1);
            var day = now.getDate();
            if (month < 10)
                month = "0" + month;
            if (day < 10)
                day = "0" + day;
            var today = now.getFullYear() + '-' + month + '-' + day;
            $('#date').val(today);
        });
    </script>
@endsection
