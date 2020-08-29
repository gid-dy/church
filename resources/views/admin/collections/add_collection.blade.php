@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content" class="col-md-12">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Collections</a> <a href="#" class="current">Add Collection</a> </div>
        <h1>Collections</h1>
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
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="list-style-type:none;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container-fluid"><hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Add Collections</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="{{ route('admin.add-collection') }}" name="add_title" id="add_title" novalidate="novalidate">
                            @csrf
                            <div class="control-group">
                                <label class="control-label">Collection Type</label>
                                <div class="controls">
                                    <select class="form-control" name="type" id="type" style="width: 220px;">
                                        <option value="offering">offering</option>
                                        <option value="donation">donation</option>
                                        <option value="tithe">tithe</option>
                                        <option value="harvest">harvest</option>
                                        <option value="welfare">welfare</option>
                                        <option value="day born">day born</option>
                                        <option value="thanksgiving">thanksgiving</option>
                                        <option value="others">others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Name</label>
                                <div class="controls">
                                    <select class="form-control" name="adult_id" id="adult_id" style="width: 220px;">
                                        <option value="">Select Name</option>
                                        @foreach($adults as $adult)
                                            @if (old('adult_id') == $adult->id)
                                                <option value="{{ $adult->id }}" selected>{{ $adult->surname }} {{ $adult->othernames }}</option>
                                            @else
                                                <option value="{{ $adult->id }}">{{ $adult->surname }} {{ $adult->othernames }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Date</label>
                                <div class="controls">
                                    <input type="text" name="date" id="dob">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Amount</label>
                                <div class="controls">
                                    <input type="text" name="amount">
                                </div>
                            </div>

                        <div class="form-actions">
                            <input type="submit" value="Add Collection" class="btn btn-success">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
