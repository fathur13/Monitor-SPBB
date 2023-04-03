<!DOCTYPE html>
<html lang="en">
{{-- header --}}
<!-- Mirrored from w3crm.dexignzone.com/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Mar 2023 12:47:27 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="W3crm:Customer Relationship Management Admin Bootstrap 5 Template">
    <meta property="og:title" content="W3crm:Customer Relationship Management Admin Bootstrap 5 Template">
    <meta property="og:description" content="W3crm:Customer Relationship Management Admin Bootstrap 5 Template">
    <meta property="og:image" content="social-image.png">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>{{ config('app.name', 'Default Title') }} - @yield('title')</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ url('public/assets') }}/images/logo/logo-transparant.png">

    <link href="{{ url('public/assets') }}/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="{{ url('public/assets') }}/vendor/swiper/css/swiper-bundle.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet"
        href="{{ url('public/assets') }}/cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.4/nouislider.min.css">
    <link href="{{ url('public/assets') }}/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="{{ url('public/assets') }}/vendor/jvmap/jquery-jvectormap.css" rel="stylesheet">
    <link href="{{ url('public/assets') }}/cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css"
        rel="stylesheet">
    <link href="{{ url('public/assets') }}/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"
        rel="stylesheet">

    <!-- tagify-css -->
    <link href="{{ url('public/assets') }}/vendor/tagify/dist/tagify.css" rel="stylesheet">

    <!-- Style css -->
    <link href="{{ url('public/assets') }}/css/style.css" rel="stylesheet">
</head>

<body data-typography="poppins" data-theme-version="light" data-layout="vertical" data-nav-headerbg="black"
    data-headerbg="color_1">

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        {{-- start header --}}
        @include('template.section.header')
        {{-- end header --}}

        {{-- start sidebar --}}
        @include('template.section.sidebar')
        {{-- end sidebar --}}

        @yield('conten')

        {{-- start footer --}}
        @include('template.section.footer')
        {{-- end footer --}}

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ url('public/assets') }}/vendor/global/global.min.js"></script>
    <script src="{{ url('public/assets') }}/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="{{ url('public/assets') }}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="{{ url('public/assets') }}/vendor/apexchart/apexchart.js"></script>

    <!-- Dashboard 1 -->
    {{-- <script src="{{ url('public/assets') }}/js/plugins-init/flot-init.js"></script> --}}
    <script src="{{ url('public/assets') }}/js/dashboard/dashboard-1.js"></script>
    <script src="{{ url('public/assets') }}/vendor/draggable/draggable.js"></script>



    <!-- tagify -->
    <script src="{{ url('public/assets') }}/vendor/tagify/dist/tagify.js"></script>

    <script src="{{ url('public/assets') }}/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('public/assets') }}/vendor/datatables/js/dataTables.buttons.min.js"></script>
    <script src="{{ url('public/assets') }}/vendor/datatables/js/buttons.html5.min.js"></script>
    <script src="{{ url('public/assets') }}/vendor/datatables/js/jszip.min.js"></script>
    <script src="{{ url('public/assets') }}/js/plugins-init/datatables.init.js"></script>

    <!-- Apex Chart -->

    <script src="{{ url('public/assets') }}/vendor/bootstrap-datetimepicker/js/moment.js"></script>
    <script src="{{ url('public/assets') }}/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Vectormap -->
    <script src="{{ url('public/assets') }}/vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="{{ url('public/assets') }}/vendor/jqvmap/js/jquery.vmap.world.js"></script>
    <script src="{{ url('public/assets') }}/vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="{{ url('public/assets') }}/js/custom.js"></script>
    <script src="{{ url('public/assets') }}/js/deznav-init.js"></script>
    <script src="{{ url('public/assets') }}/js/demo.js"></script>
    <script src="{{ url('public/assets') }}/js/styleSwitcher.js"></script>


    <!-- tagify -->
    <script src="{{ url('public/assets') }}vendor/tagify/dist/tagify.js"></script>
    

</body>

<!-- Mirrored from w3crm.dexignzone.com/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Mar 2023 12:48:13 GMT -->

</html>
