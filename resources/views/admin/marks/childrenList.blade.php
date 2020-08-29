@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content" class="col-md-12">
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
    <div class="card-header">
        <h3 class="card-title">
            @if(isset($editData))
            Edit Marks
            @else
            Add Marks
            @endif
            </h3>
            <a href="{{ url('admin/view-marks') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"> Marks List</i></a>

       </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Marks Entry</h5>
                    </div>
                    <form action="{{ route('admin.save.marks') }}" method="post">
                        @csrf
                        @if(isset($editData))
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>Children ID</th>
                                    <th>Name</th>
                                    <th>Marks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($editData as $key => $data)
                                    <tr id="div{{ $data->id }}" class="text-center">
                                        <input type="hidden" name="children_id[]" value="{{ $data->children_id }}" class="children_id">
                                            {{-- <td class="text-center"  id="{{ $children->id }}">{{ $children->id }}</td> --}}
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $data['children']['surname'] }} {{ $data['children']['othernames'] }}</td>
                                        <td class="text-center"><input type="text" name="marks{{ $key }}" value="{{ $data->marks }}"></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <input type="hidden" name="marks" id="marks">
                            <input type="hidden" name="service_id" value="{{ $data->service_id }}">
                            <input type="hidden" name="month_id" value="{{ $data->month_id }}">
                            <input type="hidden" name="year_id" value="{{ $data->year_id }}">
                        </table>
                        <button type="submit" class="btn btn-primary">{{ (@editData) ? 'Update' : 'Submit' }}</button>
                        @else
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>Children ID</th>
                                    <th>Name</th>
                                    <th>Marks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($children as $key => $child)
                                    <tr id="div{{ $child->id }}" class="text-center">
                                        <input type="hidden" name="children_id[]" value="{{ $child->id }}" class="children_id">
                                            {{-- <td class="text-center"  id="{{ $children->id }}">{{ $children->id }}</td> --}}
                                        <td>{{ $key+1 }}</td>
                                        <td class="text-center">{{ $child->surname }} {{ $child->othernames }}</td>
                                        <td class="text-center"><input type="text" name="marks{{ $key }}"></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <input type="hidden" name="marks" id="marks">
                            <input type="hidden" name="service_id" value="{{ $service_id }}">
                            <input type="hidden" name="month_id" value="{{ $month_id }}">
                            <input type="hidden" name="year_id" value="{{ $year_id }}">
                        </table>
                        <input type="submit" value="Submit" class="btn btn-primary">
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


