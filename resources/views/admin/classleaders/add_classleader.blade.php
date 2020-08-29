@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content" class="col-md-12">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Class Leaders</a> <a href="#" class="current">Add Class Leader</a> </div>
        <h1>Class Leaders</h1>
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
                        <h5>Add Class Leader</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal"  method="post" action="{{ route('admin.add-class_leader') }}" name="add_class_leader" id="add_class_leader" novalidate="novalidate">
                            @csrf
                            <div class="control-group">
                                <label class="control-label">Class Name</label>
                                <div class="controls">
                                    <select class="form-control" name="bibleclass_id" id="bibleclass_id" style="width: 220px;">
                                        <option value="">Select Bible class</option>
                                        @foreach($bibleclasses as $bibleclass)
                                            @if (old('bibleclass_id') == $bibleclass->id)
                                                <option value="{{ $bibleclass->id }}" selected>{{ $bibleclass->class_name }}</option>
                                            @else
                                                <option value="{{ $bibleclass->id }}">{{ $bibleclass->class_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Surname</label>
                                <div class="controls">
                                    <input type="text" name="surname" id="surname">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Other Names</label>
                                <div class="controls">
                                    <input type="text" name="othernames" id="othernames">
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="submit" value="Add Class Leader" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
