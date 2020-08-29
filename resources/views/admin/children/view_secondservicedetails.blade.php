@extends('layouts.adminLayout.admin_design')
@section('content')
<!--main-container-part-->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Member details</a> </div>
            <h1>Member #{{ $SecondServiceDetails->id }}</h1>
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
                <div class="main-img-preview" style="display:flex ;justify-content:center;"><img class="thumbnail img-preview" height="100px" src="{{ asset ('images/backend_images/children/'.$SecondServiceDetails->image) }}" title="Preview Logo" width="100px"></div>

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
                                <td class="taskStatus">{{ $SecondServiceDetails->surname }} {{ $SecondServiceDetails->othernames }}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Service</td>
                                <td class="taskStatus">{{ $serviceDetails->service_type }}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Membership Type</td>
                                <td class="taskStatus">{{ $SecondServiceDetails->membership_type }}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Date of Birth</td>
                                <td class="taskStatus">{{ $SecondServiceDetails->dob }}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Age</td>
                                <td class="taskStatus">{{ $SecondServiceDetails->age }}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Gender</td>
                                <td class="taskStatus">{{ $SecondServiceDetails->gender}}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Educational Level</td>
                                <td class="taskStatus">{{ $SecondServiceDetails->educational_level}}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Specify</td>
                                <td class="taskStatus">{{ $SecondServiceDetails->specify}}</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>


            </div>

            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title">
                    <h5>Member Details</h5>
                    </div>
                    <div class="widget-content nopadding">
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <tr>
                                <td class="taskDesc">Class name(Children service)</td>
                                <td class="taskStatus">{{ $childrenclassDetails->children_class}}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Contact 1</td>
                                <td class="taskStatus">{{ $SecondServiceDetails->contact_1}}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Contact 2</td>
                                <td class="taskStatus">{{ $SecondServiceDetails->contact_2}}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Baptism Status</td>
                                <td class="taskStatus">{{ $SecondServiceDetails->baptism_status}}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Occupation</td>
                                <td class="taskStatus">{{ $SecondServiceDetails->occupation}}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Resident</td>
                                <td class="taskStatus">{{ $SecondServiceDetails->resident}}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Hometown</td>
                                <td class="taskStatus">{{ $SecondServiceDetails->hometown}}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Region</td>
                                <td class="taskStatus">{{ $SecondServiceDetails->region}}</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>




        </div>

        <div class="row-fluid">
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title">
                    <h5>Father's Details</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-striped table-bordered">
                            <tbody>
                            <tr>
                                <td class="taskDesc">Father's Name</td>
                                <td class="taskStatus">{{ $SecondServiceDetails->fathers_name }}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Father's Contact</td>
                                <td class="taskStatus">{{ $SecondServiceDetails->fathers_contact }}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Father's Occupation</td>
                                <td class="taskStatus">{{ $SecondServiceDetails->fathers_occupation }}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Father Deceased ?</td>
                                <td class="taskStatus">{{ $SecondServiceDetails->father_deceased }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>

            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title">
                    <h5>Mother's Details</h5>
                    </div>
                    <div class="widget-content nopadding">
                    <table class="table table-striped table-bordered">
                        <tbody>
                        <tr>
                            <td class="taskDesc">Mother's Name</td>
                            <td class="taskStatus">{{ $SecondServiceDetails->mothers_name}}</td>
                        </tr>
                        <tr>
                            <td class="taskDesc">Mother's Contact</td>
                            <td class="taskStatus">{{ $SecondServiceDetails->mothers_contact}}</td>
                        </tr>
                        <tr>
                            <td class="taskDesc">Mother's Occupation</td>
                            <td class="taskStatus">{{ $SecondServiceDetails->mothers_occupation}}</td>
                        </tr>
                        <tr>
                            <td class="taskDesc">Mother Deceased ?</td>
                            <td class="taskStatus">{{ $SecondServiceDetails->mother_deceased}}</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title">
                        <h5>Emergency Contact Details</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-striped table-bordered">
                                <tbody>
                                <tr>
                                    <td class="taskDesc">Name</td>
                                    <td class="taskStatus">{{ $SecondServiceDetails->emergency_name }}</td>
                                </tr>
                                <tr>
                                    <td class="taskDesc">Contact</td>
                                    <td class="taskStatus">{{ $SecondServiceDetails->emergency_contact }}</td>
                                </tr>
                                <tr>
                                    <td class="taskDesc">Relationship to member</td>
                                    <td class="taskStatus">{{ $SecondServiceDetails->relation }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ url('/admin/edit-children_secondservice/'.$SecondServiceDetails->id) }}" class="btn btn-warning">
                    <span class="fa fa-edit"></span>
                    Edit Profile
                </a>

                <a href="{{ url('admin/view-children_second-service') }}" class="btn btn-danger">
                    <span class="fa fa-arrow-left"></span>
                    Back
                </a> <br> <br>
            </div>




        </div>
</div>
<!--main-container-part-->
@endsection
