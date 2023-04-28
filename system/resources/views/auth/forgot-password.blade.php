<!DOCTYPE html>
<html lang="en" class="h-100">
<!-- Mirrored from w3crm.dexignzone.com/xhtml/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Mar 2023 12:48:21 GMT -->

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
    <title>Forget Password - Monitor Sistem Pendeteksi Banjir </title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ url('public/assets') }}/images/logo/logo-transparant.png">
    <link href="{{ url('public/assets') }}/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="{{ url('public/assets') }}/css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="page-wraper">
        <!-- Content -->
        <div class="browse-job login-style3">
            <!-- Coming Soon -->
            <div class="bg-img-fix overflow-hidden"
                style="background:#fff url({{ url('public/assets') }}/images/background/bg6.jpg); height: 100vh;">
                <div class="row gx-0">
                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 vh-100 bg-white ">
                        <div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside"
                            style="max-height: 653px;" tabindex="0">
                            <div id="mCSB_1_container" class="mCSB_container" style="position:relative; top:0; left:0;"
                                dir="ltr">
                                <div class="login-form style-2">
                                    <div class="card-header">{{ __('Reset Password') }}</div>
                                    <div class="card-body">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        <div class="logo-header">
                                            <a href="index.html" class="logo"><img
                                                    src="{{ url('public/assets') }}/images/logo/logo.png" alt=""
                                                    class="width-230 light-logo" height="50px"></a>
                                            <a href="index.html" class="logo"><img
                                                    src="{{ url('public/assets') }}/images/logo/logofull-white.png"
                                                    alt="" class="width-230 dark-logo"></a>
                                        </div>
                                        <nav>
                                            <div class="nav nav-tabs border-bottom-0" id="nav-tab" role="tablist">
                                                <div class="tab-content w-100" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-forget"
                                                        role="tabpanel" aria-labelledby="nav-forget-tab">
                                                        <form class="dz-form" action="{{ route('password.email') }}"
                                                            method="POST">
                                                            @csrf
                                                            <h3 class="form-title m-t0">Forget Password ?</h3>
                                                            <div class="dz-separator-outer m-b5">
                                                                <div class="dz-separator bg-primary style-liner"></div>
                                                            </div>
                                                            <p>Enter your e-mail address below to reset your password.
                                                            </p>
                                                            <label for="email"
                                                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                                            <div class="form-group mb-4">
                                                                <input name="email" id="email"
                                                                    class="form-control @error('email') is-invalid @enderror"
                                                                    placeholder="Email Address" type="email">
                                                                @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group clearfix text-left">
                                                                <a href="{{ url('login') }}"><button
                                                                        class="active btn btn-primary"
                                                                        id="nav-personal-tab"
                                                                        type="button">back</button></a>
                                                                <button type="submit"
                                                                    class="btn btn-primary float-end">{{ __('Send Password Reset Link') }}</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                        </nav>
                                    </div>
                                    <div class="card-footer">
                                        <div class=" bottom-footer clearfix m-t10 m-b20 row text-center">
                                            <div class="col-lg-12 text-center">
                                                <span> © Copyright by <span class="heart"></span>
                                                    <a href="javascript:void(0);">Fathur Rahman </a></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div id="mCSB_1_scrollbar_vertical"
                                class="mCSB_scrollTools mCSB_1_scrollbar mCS-light mCSB_scrollTools_vertical"
                                style="display: block;">
                                <div class="mCSB_draggerContainer">
                                    <div id="mCSB_1_dragger_vertical" class="mCSB_dragger"
                                        style="position: absolute; min-height: 0px; display: block; height: 652px; max-height: 643px; top: 0px;">
                                        <div class="mCSB_dragger_bar" style="line-height: 0px;"></div>
                                        <div class="mCSB_draggerRail"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Full Blog Page Contant -->
        </div>
        <!-- Content END-->
    </div>

    <!--**********************************
 Scripts
***********************************-->
    <!-- Required vendors -->
    <script src="{{ url('public/assets') }}/vendor/global/global.min.js"></script>
    <script src="{{ url('public/assets') }}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="{{ url('public/assets') }}/js/deznav-init.js"></script>
    <script src="{{ url('public/assets') }}/js/custom.js"></script>
    <script src="{{ url('public/assets') }}/js/demo.js"></script>
    <script src="{{ url('public/assets') }}/js/styleSwitcher.js"></script>
</body>

<!-- Mirrored from w3crm.dexignzone.com/xhtml/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Mar 2023 12:48:22 GMT -->

</html>
