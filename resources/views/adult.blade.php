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
    {{--  <video autoplay="" id="myvideo" loop="" muted=""><source src="{{ asset('images/frontend_images/one.mp4') }}"
        type="video/mp4"></video>  --}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-2">
                    <img src="{{ asset('images/frontend_images/logo.png') }}" title="Preview Logo">
                </div>
                <div class="col-md-10">
                    <h2 class="church">THE METHODIST CHURCH GHANA</h2>
                    <h3 class="church">KUMASI DIOCESE</h3>
                    <h4 class="church">AYEDUASE CIRCUIT</h4>
                    <h5 class="church">MOUNT ZION SOCIETY - KOTEI</h5>
                    <h1 class="church">DATABASE FORM</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-login filter">
                    <div class="panel-heading filter">
                        <div class="row">
                            <div class="col-md-6" style="background-color: red;padding:20px">
                                <a class="active" href="{{ url('/') }}">Adult Service</a>
                            </div>
                            <div class="col-md-6" style="background-color: blue;padding:20px">
                                <a href="{{ url('/children-service') }}">Children Service</a>
                            </div>
                        </div>
                        <hr>
                    </div>
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
                                <form role="form" enctype="multipart/form-data" method="post" action="{{ url('/') }}" name="adult_service" novalidate="novalidate">
                                    {{ csrf_field() }}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="main-img-preview"><img class="thumbnail img-preview" height="308px" src="{{ asset('images/frontend_images/blank.png') }}" title="Preview Logo" width="239px"></div>
                                            <div class="input-group col-md-8">
                                                <input class="form-control fake-shadow" disabled="disabled" id="childimage" placeholder="Choose File">
                                                <div class="input-group-btn">
                                                    <div class="fileUpload btn btn-primary fake-shadow">
                                                        <span>Upload Logo</span> <input class="attachment_upload" id="child-image" name="image" type="file">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <div class="form-group row">
                                            <div class="form-group col-md-4">
                                                <label>Service Type<span class="text-danger">*</span></label>
                                                <select id="service_id" class="form-control" name="service_id" required>
                                                    <option value="">Select Service Type</option>
                                                    @foreach($services as $service)
                                                        @if (old('service_id') == $service->id)
                                                            <option value="{{ $service->id }}" selected>{{ $service->service_type }}</option>
                                                        @else
                                                            <option value="{{ $service->id }}">{{ $service->service_type }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Membership Type<span class="text-danger">*</span></label>
                                                <select class="form-control" name="membership_type" id="membership_type">
                                                    <option value="Full Member">Full Member</option>
                                                    <option value="Distant Member">Distant Member</option>
                                                    <option value="Prospect">Prospect</option>
                                                    <option value="Visitor">Visitor</option>
                                                    <option value="Deceased">Deceased</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Position<span class="text-danger">*</span></label>
                                                <select class="form-control" name="position" id="position">
                                                    <option value="Snr. Pastor">Snr. Pastor</option>
                                                    <option value="Pastor">Pastor</option>
                                                    <option value="Steward">Steward</option>
                                                    <option value="Member">Member</option>
                                                    <option value="Sunday School Teacher">Sunday School Teacher</option>
                                                    <option value="Sunday School Helper">Sunday School Helper</option>
                                                    <option value="Usher">Usher</option>
                                                    <option value="Leader">Leader</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Title<span class="text-danger">*</span></label>
                                                <select id="title_id" class="form-control" name="title_id" required>
                                                    <option value="">Select Title</option>
                                                    @foreach($titles as $title)
                                                        @if (old('title_id') == $title->id)
                                                            <option value="{{ $title->id }}" selected>{{ $title->title }}</option>
                                                        @else
                                                            <option value="{{ $title->id }}">{{ $title->title }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Surname<span class="text-danger">*</span></label> <input class="form-control" name="surname" placeholder="Surname" value="{{ old('surname') }}" type="text">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Other names<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend"></div><input class="form-control" name="othernames" value="{{ old('othernames') }}" placeholder="Other names" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Date of Birth<span class="text-danger">*</span></label> <input class="form-control" name="dob" onblur="getAge();" id="datepicker" value="{{ old('dob') }}"  type="text">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Age<span class="text-danger">*</span></label> <input class="form-control" id="age" name="age" value="{{ old('age') }}" type="text" readonly>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Gender<span class="text-danger">*</span></label>
                                                <div>
                                                    <span>
                                                        <label><input type="radio" id="male" name="gender" value="male" {{ (old('gender')=='male') ? 'checked': '' }}>male </label>
                                                    </span>
                                                    <span style="margin-left: 20px;">
                                                        <label><input type="radio" id="female" name="gender" value="female" {{ (old('gender')=='female') ? 'checked': '' }}>female</label>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <label>Email</label> <input class="form-control" name="email" value="{{ old('email') }}" type="text" placeholder="email address">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label>Mobile/Phone<span class="text-danger">*</span></label> <input class="form-control" name="contact_1" value="{{ old('contact_1') }}" type="text" placeholder="contact">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Other Contact</label> <input class="form-control" name="contact_2" value="{{ old('contact_2') }}" placeholder="other contact" type="text">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Baptism Status<span class="text-danger">*</span></label>
                                                <div>
                                                    <span>
                                                        <label><input type="radio"  name="baptism_status" value="Baptised" {{ (old('baptism_status')=='Baptised') ? 'checked': '' }}>Baptised </label>
                                                    </span>
                                                    <span style="margin-left: 50px;">
                                                        <label><input type="radio"  name="baptism_status" value="not baptised" {{ (old('baptism_status')=='not baptised') ? 'checked': '' }}>Not Baptised</label>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-group col-md-4">
                                            <label>Bible Class<span class="text-danger">*</span> </label>
                                            <select class="form-control" name="bibleclass_id" id="bibleclass_id">
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
                                        <div class="form-group col-md-4">
                                            <label>Organisation<span class="text-danger">*</span></label>
                                            <select class="form-control mul-select" multiple="true"  name="Organisation_id[]">
                                                @foreach($Organisations as $Organisation)
                                                        <option value="{{ $Organisation->id }}" {{ (collect(old('Organisation_id'))->contains($Organisation->id)) ? 'selected': ''}}>{{ $Organisation->Organisation }}</option>

                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4"  id="childrenclass_id">
                                            <label>Children class</label>
                                            <select class="form-control"  name="childrenclass_id" >
                                                <option value="">Select Children class</option>
                                                @foreach($childrenclasses as $childrenclass)
                                                    @if (old('childrenclass_id') == $childrenclass->id)
                                                        <option value="{{ $childrenclass->id }}" selected>{{ $childrenclass->children_class ?? '' }}</option>
                                                    @else
                                                        <option value="{{ $childrenclass->id }}">{{ $childrenclass->children_class ?? ''}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-group col-md-4">
                                            <label>Marital Status<span class="text-danger">*</span></label>
                                            <div>
                                                <span>
                                                    <label><input type="radio" name="married_status" value="married" {{ (old('married_status')=='married') ? 'checked': '' }}>Married </label>
                                                </span>
                                                <span style="margin-left: 50px;">
                                                    <label><input type="radio" name="married_status" value="single" {{ (old('married_status')=='single') ? 'checked': '' }}>Single</label>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Anniversary Date</label> <input class="form-control" name="anniversary_date" id="datepicker1" hidden="true" value="{{ old('anniversary_date') }}"  type="text">
                                        </div>
                                        <div class="form-group col-md-3" >
                                            <label for="rolename">Children</label>
                                            <select class="form-control mul-select" multiple="true" name="children_id[]">
                                                @foreach($children as $children)
                                                    <option value="{{ $children->id }}" {{ (collect(old('children_id'))->contains($children->id)) ? 'selected': ''}}>{{ $children->surname }} {{ $children->othernames }}</option>

                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Occupation<span class="text-danger">*</span></label> <input class="form-control" name="occupation" value="{{ old('occupation') }}"  type="text">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-group col-md-4">
                                            <label>Resident<span class="text-danger">*</span></label> <input class="form-control" name="resident" value="{{ old('resident') }}"  type="text">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>HomeTown<span class="text-danger">*</span></label> <input class="form-control" type="text" value="{{ old('hometown') }}" name="hometown">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Region<span class="text-danger">*</span></label>
                                            <select class="form-control" name="region" id="region">
                                                <option value="">Select Region</option>
                                                @foreach($regions as $region)
                                                    @if (old('region') == $region->region)
                                                        <option value="{{ $region->region }}" selected> {{ $region->region }}</option>
                                                    @else
                                                        <option value="{{ $region->region }}"> {{ $region->region }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-group col-md-12"><h2 style="text-align: center;">Parent Infomation</h2></div>
                                        <div class="form-group col-md-4">
                                            <label>Mother's Name<span class="text-danger">*</span></label> <input class="form-control"  type="text" name="mothers_name" value="{{ old('mothers_name') }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Contact<span class="text-danger">*</span></label> <input class="form-control"  type="text" name="mothers_contact" value="{{ old('mothers_contact') }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Deceased ?<span class="text-danger">*</span></label>
                                            <div>
                                                <div class="form-group col-md-4">
                                                    <label><input type="checkbox" class="mother_deceased" name="mother_deceased" value="no" {{ (old('mother_deceased')=='no') ? 'checked': '' }}>No </label>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label><input type="checkbox" class="mother_deceased" name="mother_deceased" value="yes" {{ (old('mother_deceased')=='yes') ? 'checked': '' }}>Yes</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-group col-md-4">
                                            <label>Father's Name<span class="text-danger">*</span></label> <input class="form-control"  type="text" name="fathers_name" value="{{ old('fathers_name') }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Contact<span class="text-danger">*</span></label> <input class="form-control"  type="text" name="fathers_contact" value="{{ old('fathers_contact') }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Deceased ?<span class="text-danger">*</span></label>
                                            <div>
                                                <div class="form-group col-md-4">
                                                    <label><input type="checkbox" class="father_deceased" name="father_deceased" value="no" {{ (old('father_deceased')=='no') ? 'checked': '' }}>No </label>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label><input type="checkbox" class="father_deceased" name="father_deceased" value="yes" {{ (old('father_deceased')=='yes') ? 'checked': '' }}>Yes</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="form-group col-md-12"><h2 style="text-align: center;">Emergency Contact Details</h2></div>
                                        <div class="form-group col-md-4">
                                            <label>Name<span class="text-danger">*</span></label> <input class="form-control"  type="text" name="emergency_name" value="{{ old('emergency_name') }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Contact<span class="text-danger">*</span></label> <input class="form-control"  type="text" name="emergency_contact" value="{{ old('emergency_contact') }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                                <label>Relationship with member<span class="text-danger">*</span></label> <input class="form-control"  type="text" name="relation" value="{{ old('relation') }}">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-8">
                                        <input class="form-control btn btn-register" tabindex="4" type="submit" value="Register Now">
                                    </div>
                                </form>
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
            $(".mul-select").select2({
                placeholder: "select ",
            });

            $('.mother_deceased').on('change',function() {
                $('.mother_deceased').not(this).prop('checked',false);
            });

            $('.father_deceased').on('change',function() {
                $('.father_deceased').not(this).prop('checked',false);
            });
            $('input[name="married_status"]').on('click',function(){
                if($(this).val() == 'married'){
                    $('#datepicker1').show();
                }else{
                    $('#datepicker1').hide();
                }
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
