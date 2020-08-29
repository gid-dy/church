<!DOCTYPE html>
<html lang="en">
<head>
<title>Mt Zion Methodist, kotei</title>
<link rel="shortcut icon" href="{{ asset('images/frontend_images/icon.png') }}" type="image/x-icon">
<link rel="icon" href="{{ asset('images/frontend_images/icon.png') }}" type="image/x-icon">
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/backend_css/sb-admin.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap-responsive.min.css') }}" />
{{-- <link rel="stylesheet" href="{{ asset('css/backend_css/uniform.css') }}" /> --}}
<link rel="stylesheet" href="{{ asset('css/backend_css/fullcalendar.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/matrix-style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/matrix-media.css') }}" />
<link href="font-awesome/{{ asset('fonts/backend_fonts/css/font-awesome.css') }}" />
<link href="{{ asset('fonts/backend_fonts/css/font-awesome.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/backend_css/jquery.gritter.css') }}" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css' />

</head>
<body>


@include('layouts.adminLayout.admin_header')
@include('layouts.adminLayout.admin_sidebar')

@yield('content')

@include('layouts.adminLayout.admin_footer')
{{-- <script src="{{ asset('js/jquery.min.js') }}"></script> --}}
<script src="{{ asset('js/backend_js/jquery.min.js') }}"></script>
<script src="{{ asset('js/backend_js/matrix.form_validation.js') }}"></script>


{{-- <script src="{{ asset('js/backend_js/jquery.ui.custom.js') }}"></script>  --}}
<script src="{{ asset('js/backend_js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/backend_js/jquery.uniform.js') }}"></script>
<script src="{{ asset('js/backend_js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/backend_js/select2.min.js') }}"></script>
<script src="{{ asset('js/backend_js/jquery.validate.js') }}"></script>
<script src="{{ asset('js/backend_js/matrix.js') }}"></script>

<script src="{{ asset('js/backend_js/matrix.tables.js') }}"></script>
{{-- <script src="{{ asset('js/backend_js/matrix.popover.js') }}"></script> --}}

{{-- <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}

{{--
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/backend_js/sb-admin.min.js') }}"></script>  --}}
{{-- <script src="{{ asset('js/backend_js/wysihtml5-0.3.0.js') }}"></script> --}}
{{-- <script src="{{ asset('js/backend_js/bootstrap-wysihtml5.js') }}"></script> --}}
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
  $( function() {
    $( "#dob" ).datepicker({
        dateFormat:'yy-mm-dd'
        });
    });
  </script>



</body>
</html>
