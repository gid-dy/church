
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
            <div class="card-header">
                <h3 class="card-title">
                    @if(isset($editData))
                    Edit Attendance
                    @else
                    Add Attendance
                    @endif
                    </h3>
                <a href="{{ url('admin/attend-view') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"> Attendance List</i></a>
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
                    <form method="post" action="{{ route('admin.save.attendance') }}">
                        @csrf
                        @if(isset($editData))
                        <div class="card-body">
                            <div class="col-md-4">
                                <label class="control-label" for="date">Attendance Date</label>
                                <input type="text" name="date" id="dob" value="{{ $editData['0']['date']  }}" class="checkdate form-control form-control-sm singledatepicker" placeholder="Attendance date" autocomplete="off" readonly>
                            </div>
                            <table class="table-sm table-bordered table-striped " style="width: 100%">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle">ID</th>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle">Name</th>
                                        <th colspan="2" class="text-center" style="vertical-align: middle;width:25%">Attendance Status</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center btn present_all" style="display: table-cell;background-color: azure">Present</th>
                                        <th class="text-center btn absent_all" style="display: table-cell;background-color: azure">Absent</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($editData as $key => $data)
                                        <tr id="div{{ $data->id }}" class="text-center">
                                            <input type="hidden" name="children_id[]" value="{{ $data->children_id }}" class="children_id">
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $data['children']['surname'] }} {{ $data['children']['othernames'] }}</td>
                                            <td colspan="1">
                                                <div class="present">
                                                    <input class="present" id="present{{ $key }}" name="attendance_status{{ $key }}" value="Present" type="radio" {{ ($data->attendance_status=='Present')?'checked':''}}/>
                                                    <label for="present{{ $key }}"> Present</label>
                                                </div>
                                            </td>
                                            <td colspan="1">
                                                <div class="absent">
                                                    <input class="absent" id="absent{{ $key }}" name="attendance_status{{ $key }}" value="Absent" type="radio" {{ ($data->attendance_status=='Absent')?'checked':''}}/>
                                                    <label for="absent{{ $key }}"> Absent</label>
                                                    <a></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table><br/>
                            <button type="submit" class="btn btn-success btn-sm">{{ (@editData) ? 'Update' : 'Submit' }}</button>
                        </div>
                        @else
                        <div class="card-body">
                            <div class="col-md-4">
                                <label class="control-label" for="date">Attendance Date</label>
                                <input type="text" name="date" id="dob" value="{{ old('dob') }}" class="checkdate form-control form-control-sm singledatepicker" placeholder="Attendance date" autocomplete="off">
                            </div>
                            <table class="table-sm table-bordered table-striped " style="width: 100%">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle">ID</th>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle">Name</th>
                                        <th colspan="2" class="text-center" style="vertical-align: middle;width:25%">Attendance Status</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center btn present_all" style="display: table-cell;background-color: azure">Present</th>
                                        <th class="text-center btn absent_all" style="display: table-cell;background-color: azure">Absent</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($children as $key => $attend)
                                        <tr id="div{{ $attend->id }}" class="text-center">
                                            <input type="hidden" name="children_id[]" value="{{ $attend->id }}" class="children_id">
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $attend->surname }} {{ $attend->othernames }}</td>
                                            <td colspan="1">
                                                <div class="present">
                                                    <input class="present" id="present{{ $key }}" name="attendance_status{{ $key }}" value="Present" type="radio" />
                                                    <label for="present{{ $key }}"> Present</label>
                                                </div>
                                            </td>
                                            <td colspan="1">
                                                <div class="absent">
                                                    <input class="absent" id="absent{{ $key }}" name="attendance_status{{ $key }}" value="Absent" type="radio" checked="checked"/>
                                                    <label for="absent{{ $key }}"> Absent</label>
                                                    <a></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table><br/>
                            <button type="submit" class="btn btn-success btn-sm">{{ (@editData) ? 'Update' : 'Submit' }}</button>
                        </div>
                        @endif
                    </form>
                </div>
              </div>
            </div>
          </div>

    </div>

@endsection


