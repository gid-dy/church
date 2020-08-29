<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Mt Zion Methodist, kotei</title>
    <link rel="shortcut icon" href="{{ asset('images/frontend_images/icon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/frontend_images/icon.png') }}" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Ruda:400,900,700" rel="stylesheet">
    <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/backend_css/select2.css') }}" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="{{ asset('css/frontend_css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script>
        $(function() {
            $( "#datepicker" ).datepicker({
                dateFormat:'yy-mm-dd',
                changeMonth : true,
                changeYear : true,
                yearRange: '-100y:c+nn',
                maxDate: '-1d'
            });

            $( "#datepicker1" ).datepicker({
                dateFormat:'yy-mm-dd',
                changeMonth : true,
                changeYear : true,
                yearRange: '-100y:c+nn',
                maxDate: '-1d'
            });
        });
    </script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="church">UPDATE MEMBERSHIP INFORMATION</h2>
        </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-login filter">
                    <div class="panel-body">
                        <div class="row">
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
                            <div class="col-md-12">
                                <form  role="form" enctype="multipart/form-data" method="post" action="{{ url('/admin/edit-children_secondservice/'.$childrenDetails->id) }}" name="edit_children_service"s novalidate="novalidate">
                                    {{ csrf_field() }}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            @if(!empty($childrenDetails->image))
                                                        <img class="thumbnail img-preview" height="308px" src="{{ asset('images/backend_images/children/'.$childrenDetails->image) }}" title="Preview image" width="239px">
                                                    @endif
                                            <div class="input-group col-md-8">
                                                <input class="form-control fake-shadow" disabled="disabled" id="childimage" placeholder="Choose File">
                                                <div class="input-group-btn">
                                                    <div class="fileUpload btn btn-primary fake-shadow">
                                                        <input type="hidden" name="current_image" value="{{ $childrenDetails->image}}">
                                                        <span>Upload Logo</span> <input class="attachment_upload" id="child-image" name="image" type="file">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <div class="form-group row">
                                            <div class="form-group col-md-6">
                                                <label>Service Type<span class="text-danger">*</span></label>
                                                <select id="service_id" class="form-control" name="service_id" required>
                                                    <option value="">Select Service Type</option>
                                                    @foreach($services as $service)
                                                            <option value="{{ $service->id }}" @if($service->service_id == $childrenDetails->service)selected @endif>{{ $service->service_type }}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Membership Type<span class="text-danger">*</span></label>
                                                <select class="form-control" name="membership_type" id="membership_type">
                                                    <option value="Full Member" <?php if($childrenDetails['membership_type'] =="Full Member"){echo "selected";} ?>>Full Member</option>
                                                    <option value="Distant Member" <?php if($childrenDetails['membership_type'] =="Distant Member"){echo "selected";} ?>>Distant Member</option>
                                                    <option value="Prospect" <?php if($childrenDetails['membership_type'] =="Prospect"){echo "selected";} ?>>Prospect</option>
                                                    <option value="Visitor" <?php if($childrenDetails['membership_type'] =="Visitor"){echo "selected";} ?>>Visitor</option>
                                                    <option value="Deceased" <?php if($childrenDetails['membership_type'] =="Deceased"){echo "selected";} ?>>Deceased</option>
                                                </select>
                                            </div>


                                            <div class="form-group col-md-4">
                                                <label>Title<span class="text-danger">*</span></label>
                                                <select id="title_id" class="form-control" name="title_id" required>
                                                    <option value="">Select Title</option>
                                                    @foreach($titles as $title)
                                                            <option value="{{ $title->id }}" @if($title->title_id == $childrenDetails->title)selected @endif>{{ $title->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Surname<span class="text-danger">*</span></label> <input class="form-control" name="surname" placeholder="Surname" value="{{ $childrenDetails->surname }}" type="text">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Other names<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend"></div><input class="form-control" name="othernames" value="{{ $childrenDetails->othernames }}" placeholder="Other names" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Date of Birth<span class="text-danger">*</span></label> <input class="form-control" name="dob" id="datepicker" onblur="getAge();" value="{{ $childrenDetails->dob }}"  type="text">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Age<span class="text-danger">*</span></label> <input class="form-control" name="age" id="age" value="{{ $childrenDetails->age }}"  type="text" readonly>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Gender<span class="text-danger">*</span></label>
                                                <div>
                                                    <span>
                                                        <label><input type="radio" id="male" name="gender" value="male" <?php if($childrenDetails['gender'] =="male"){echo "checked";} ?>>male </label>
                                                    </span>
                                                    <span style="margin-left: 20px;">
                                                        <label><input type="radio" id="female" name="gender" value="female" <?php if($childrenDetails['gender'] =="female"){echo "checked";} ?>>female</label>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Educational Level<span class="text-danger">*</span></label>
                                                <div class="form-row mt-2">
                                                    <div class="form-group col-md-2">
                                                        <div class="form-check">
                                                            <input type="radio" name="educational_level" value="nursery" <?php if($childrenDetails['educational_level'] =="nursery"){echo "checked";} ?>>
                                                            <label>Nursery</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <div class="form-check">
                                                                <input type="radio" name="educational_level" value="primary" <?php if($childrenDetails['educational_level'] =="primary"){echo "checked";} ?>>
                                                                <label>Primary</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <div class="form-check">
                                                            <input type="radio" name="educational_level" value="jhs" <?php if($childrenDetails['educational_level'] =="jhs"){echo "checked";} ?>>
                                                            <label>J.H.S</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <div class="form-check">
                                                            <input type="radio" name="educational_level" value="shs" <?php if($childrenDetails['educational_level'] =="shs"){echo "checked";} ?>>
                                                            <label>S.H.S</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <div class="form-check">
                                                            <input type="radio" name="educational_level" value="tertiary" <?php if($childrenDetails['educational_level'] =="tertiary"){echo "checked";} ?>>
                                                            <label>Tertiary</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                       <input class="form-control" name="specify" value="{{ $childrenDetails->specify }}" type="text" placeholder="Specify">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label>Mobile/Phone</label> <input class="form-control" name="contact_1" value="{{ $childrenDetails->contact_1 }}" type="text" placeholder="contact">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Other Contact</label> <input class="form-control" name="contact_2" value="{{ $childrenDetails->contact_2 }}" placeholder="other contact" type="text">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Baptism Status<span class="text-danger">*</span></label>
                                                <div class="form-row mt-2">
                                                <div class="form-group col-md-6">
                                                    <div class="form-check">
                                                        <input type="radio"  name="baptism_status" value="Baptised" <?php if($childrenDetails['baptism_status'] =="Baptised"){echo "checked";} ?>>
                                                        <label>Baptised </label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="form-check">
                                                        <input type="radio"  name="baptism_status" value="not baptised" <?php if($childrenDetails['baptism_status'] =="not baptised"){echo "checked";} ?>>
                                                        <label>Not Baptised</label>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-group col-md-6">
                                            <label>Children class<span class="text-danger">*</span></label>
                                            <select class="form-control" name="childrenclass_id" id="childrenclass_id">
                                                <option value="">Select Bible class</option>
                                                @foreach($childrenclasses as $childrenclass)
                                                        <option value="{{ $childrenclass->id }}" @if($childrenclass->childrenclass_id == $childrenDetails->childrenclass)selected @endif>{{ $childrenclass->children_class }}</option>

                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Occupation</label> <input class="form-control" name="occupation" value="{{ $childrenDetails->occupation }}"  type="text">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-group col-md-4">
                                            <label>Resident<span class="text-danger">*</span></label> <input class="form-control" name="resident" value="{{ $childrenDetails->resident }}"  type="text">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>HomeTown<span class="text-danger">*</span></label> <input class="form-control" type="text" value="{{ $childrenDetails->hometown }}" name="hometown">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Region<span class="text-danger">*</span></label>
                                            <select class="form-control" name="region" id="region">
                                                <option value="">Select Region</option>
                                                @foreach($regions as $region)
                                                    <option value="{{ $region->region }}" @if($region->region == $childrenDetails->region)selected @endif> {{ $region->region }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-group col-md-12"><h2 style="text-align: center;">Parent Infomation</h2></div>
                                        <div class="form-group col-md-3">
                                            <label>Mother's Name<span class="text-danger">*</span></label> <input class="form-control"  type="text" name="mothers_name" value="{{ $childrenDetails->mothers_name }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Contact</label> <input class="form-control"  type="text" name="mothers_contact" value="{{ $childrenDetails->mothers_contact }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Occupation</label> <input class="form-control"  type="text" name="mothers_occupation" value="{{ $childrenDetails->fathers_occupation }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Deceased ?<span class="text-danger">*</span></label>
                                            <div>
                                                <div class="form-group col-md-2">
                                                    <label><input type="checkbox" class="mother_deceased" name="mother_deceased" value="no" <?php if($childrenDetails['mother_deceased'] =="no"){echo "checked";} ?>>No </label>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label><input type="checkbox" class="mother_deceased" name="mother_deceased" value="yes" <?php if($childrenDetails['mother_deceased'] =="yes"){echo "checked";} ?>>Yes</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-group col-md-3">
                                            <label>Father's Name<span class="text-danger">*</span></label> <input class="form-control"  type="text" name="fathers_name" value="{{ $childrenDetails->fathers_name }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Contact</label> <input class="form-control"  type="text" name="fathers_contact" value="{{ $childrenDetails->fathers_contact }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Occupation</label> <input class="form-control" type="text" name="fathers_occupation" value="{{ $childrenDetails->fathers_occupation }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Deceased ?<span class="text-danger">*</span></label>
                                            <div>
                                                <div class="form-group col-md-2">
                                                    <label><input type="checkbox" class="father_deceased" name="father_deceased" value="no" <?php if($childrenDetails['father_deceased'] =="no"){echo "checked";} ?>>No </label>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label><input type="checkbox" class="father_deceased" name="father_deceased" value="yes" <?php if($childrenDetails['father_deceased'] =="yes"){echo "checked";} ?>>Yes</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="form-group col-md-12"><h2 style="text-align: center;">Emergency Contact Details</h2></div>
                                        <div class="form-group col-md-4">
                                            <label>Name<span class="text-danger">*</span></label> <input class="form-control"  type="text" name="emergency_name" value="{{ $childrenDetails->emergency_name }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Contact<span class="text-danger">*</span></label> <input class="form-control"  type="text" name="emergency_contact" value="{{ $childrenDetails->emergency_contact }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                                <label>Relationship with member<span class="text-danger">*</span></label> <input class="form-control"  type="text" name="relation" value="{{ $childrenDetails->relation }}">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-8">
                                        <input class="form-control btn btn-register" tabindex="4" type="submit" value="Update Info">
                                    </div>
                                </form>
                                <div class="modal-footer">
                                    <a href="{{ url('admin/view-children_secondservice/'.$childrenDetails->id) }}" class="btn btn-danger">
                                        <span class="fa fa-arrow-left"></span>
                                        Back
                                    </a> <br> <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript Libraries -->
    <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/backend_js/select2.min.js') }}"></script>
    <!-- Template Main Javascript File -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('js/frontend_js/main.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.mother_deceased').on('change',function() {
                $('.mother_deceased').not(this).prop('checked',false);
            });

            $('.father_deceased').on('change',function() {
                $('.father_deceased').not(this).prop('checked',false);
            });


        });
    </script>

    <script type="text/javascript">
        function getAge(){
            var dob = document.getElementById('datepicker').value;
            dob = new Date(dob);
            var today = new Date();
            var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
            document.getElementById('age').value=age;
        }
    </script>

</body>

</html>
