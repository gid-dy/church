@extends('layouts.adminLayout.admin_design')
@section('content')
<!--main-container-part-->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Member details</a> </div>
            <h1>Member #{{ $FirstServiceDetails->id }}</h1>
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
            <table id="example" class="table table-striped table-bordered nowrap" style="text-align: center; display:block;">
                <div class="main-img-preview" style="display:flex ;justify-content:center;"><img class="thumbnail img-preview" height="100px" src="{{ asset ('images/backend_images/adults/'.$FirstServiceDetails->image) }}" title="Preview Logo" width="100px"></div>

            </table>
        </div>
        <div class="row-fluid">
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title">
                    <h5>Member Details</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-striped table-bordered">
                            <tbody>
                            <tr>
                                <td class="taskDesc">Title</td>
                                <td class="taskStatus">{{ $titleDetails->title }}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Name</td>
                                <td class="taskStatus">{{ $FirstServiceDetails->surname }} {{ $FirstServiceDetails->othernames }}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Service</td>
                                <td class="taskStatus">{{ $serviceDetails->service_type }}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Membership Type</td>
                                <td class="taskStatus">{{ $FirstServiceDetails->membership_type }}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Position</td>
                                <td class="taskStatus">{{ $FirstServiceDetails->position }}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Bible Class</td>
                                <td class="taskStatus">{{ $bibleclassDetails->class_name }}</td>
                            </tr>
                            @if($FirstServiceDetails->position == "Sunday School Teacher" || $FirstServiceDetails->position == "Sunday School Helper")
                            <tr>
                                <td class="taskDesc">Children Class</td>
                                <td class="taskStatus">{{ $childrenclassDetails->children_class  ?? '' }} </td>
                            </tr>
                            @endif
                            <tr>
                                <td class="taskDesc">Date of Birth</td>
                                <td class="taskStatus">{{ $FirstServiceDetails->dob }}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Age</td>
                                <td class="taskStatus">{{ $FirstServiceDetails->age }}</td>
                            </tr>
                            <tr>   
                                @foreach($FirstServiceDetails->Organisation as $Organisation)
                                <td class="taskDesc">Organisation</td>
                                <td class="taskStatus">{{ $Organisation->Organisation}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="taskDesc">Gender</td>
                                <td class="taskStatus">{{ $FirstServiceDetails->gender}}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Email</td>
                                <td class="taskStatus">{{ $FirstServiceDetails->email}}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Mobile/Phone</td>
                                <td class="taskStatus">{{ $FirstServiceDetails->contact_1}}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Other Contact</td>
                                <td class="taskStatus">{{ $FirstServiceDetails->contact_2}}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Baptism Status</td>
                                <td class="taskStatus">{{ $FirstServiceDetails->baptism_status}}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Marriage Status</td>
                                <td class="taskStatus">{{ $FirstServiceDetails->married_status}}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Anniversary Date</td>
                                <td class="taskStatus">{{ $FirstServiceDetails->anniversary_date}}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Occupation</td>
                                <td class="taskStatus">{{ $FirstServiceDetails->occupation}}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Resident</td>
                                <td class="taskStatus">{{ $FirstServiceDetails->resident}}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Hometown</td>
                                <td class="taskStatus">{{ $FirstServiceDetails->hometown}}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Region</td>
                                <td class="taskStatus">{{ $FirstServiceDetails->region}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>

            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title">
                    <h5>Parents Details</h5>
                    </div>
                    <div class="widget-content nopadding">
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <tr>
                                <td class="taskDesc">Mother's Name</td>
                                <td class="taskStatus">{{ $FirstServiceDetails->mothers_name}}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Mother's Contact</td>
                                <td class="taskStatus">{{ $FirstServiceDetails->mothers_contact}}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Mother Deceased ?</td>
                                <td class="taskStatus">{{ $FirstServiceDetails->mother_deceased}}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Father's Name</td>
                                <td class="taskStatus">{{ $FirstServiceDetails->fathers_name }}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Father's Contact</td>
                                <td class="taskStatus">{{ $FirstServiceDetails->fathers_contact }}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Father Deceased ?</td>
                                <td class="taskStatus">{{ $FirstServiceDetails->father_deceased }}</td>
                            </tr>

                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="widget-box">
                    <div class="widget-title">
                    <h5>Emergency Contact Details</h5>
                    </div>
                    <div class="widget-content nopadding">
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <tr>
                                <td class="taskDesc"> Name</td>
                                <td class="taskStatus">{{ $FirstServiceDetails->emergency_name}}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Contact</td>
                                <td class="taskStatus">{{ $FirstServiceDetails->emergency_contact}}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Relation</td>
                                <td class="taskStatus">{{ $FirstServiceDetails->relation}}</td>
                            </tr>

                        </tbody>
                    </table>
                    </div>
                </div>
            </div>




        </div>



            <div class="row-fluid">
                <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Children</th>
                    </thead>
                    <tbody>
                        <ul>
                            @foreach($FirstServiceDetails->children as $c)
                        <tr>
                            <td>{{ $c->surname }} {{ $c->othernames }}</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <a href="{{ url('/admin/edit-adult_firstservice/'.$FirstServiceDetails->id) }}" class="btn btn-warning">
                    <span class="fa fa-edit"></span>
                    Edit Profile
                </a>

                <a href="{{ url('admin/view-adult_first-service') }}" class="btn btn-danger">
                    <span class="fa fa-arrow-left"></span>
                    Back
                </a> <br> <br>
            </div>




        </div>
</div>
<!--main-container-part-->
@endsection
