<!DOCTYPE html>
<html lang="en" class="h-100">


<!-- Mirrored from w3crm.dexignzone.com/xhtml/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Mar 2023 12:48:21 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75jXO5mwgHz5+" crossorigin="anonymous">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #F7F7F7;
            font-family: 'Open Sans', sans-serif;
        }

        .form-signin {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #FFF;
            border-radius: 5px;
            box-shadow: 0px 0px 10px #999;
        }

        .form-signin h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-signin input[type="email"],
        .form-signin input[type="password"] {
            font-size: 16px;
            height: auto;
            margin-bottom: 10px;
            padding: 7px;
        }

        .form-signin button[type="submit"] {
            background-color: #3399FF;
            color: #FFF;
            border: none;
            padding: 10px;
            width: 100%;
            font-size: 18px;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-signin button[type="submit"]:hover {
            background-color: #1E7CEC;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form class="form-signin" method="POST" action="{{ route('login') }}">
                    @csrf
                    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                    <label for="email" class="sr-only">Email address</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email address"
                        required autofocus>
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password"
                        required>
                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" name="remember" value="1"> Remember me
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                </form>
            </div>
        </div>
    </div>
    <div class="page-wraper">

        <!-- Content -->
        <div class="browse-job login-style3">
            <!-- Coming Soon -->
            <div class="bg-img-fix overflow-hidden"
                style="background:#fff url(images/background/bg6.jpg); height: 100vh;">
                <div class="row gx-0">
                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 vh-100 bg-white ">
                        <div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside"
                            style="max-height: 653px;" tabindex="0">
                            <div id="mCSB_1_container" class="mCSB_container" style="position:relative; top:0; left:0;"
                                dir="ltr">
                                <div class="login-form style-2">


                                    <div class="card-body">
                                        <div class="logo-header">
                                            <a href="index.html" class="logo"><img src="images/logo/logo-full.png"
                                                    alt="" class="width-230 light-logo"></a>
                                            <a href="index.html" class="logo"><img
                                                    src="images/logo/logofull-white.png" alt=""
                                                    class="width-230 dark-logo"></a>
                                        </div>

                                        <nav>
                                            <div class="nav nav-tabs border-bottom-0" id="nav-tab" role="tablist">

                                                <div class="tab-content w-100" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-personal"
                                                        role="tabpanel" aria-labelledby="nav-personal-tab">
                                                        <form action="https://w3crm.dexignzone.com/xhtml/index.html"
                                                            class=" dz-form pb-3">
                                                            <h3 class="form-title m-t0">Personal Information</h3>
                                                            <div class="dz-separator-outer m-b5">
                                                                <div class="dz-separator bg-primary style-liner"></div>
                                                            </div>
                                                            <p>Enter your e-mail address and your password. </p>
                                                            <div class="form-group mb-3">
                                                                <input type="email" class="form-control"
                                                                    value="hello@example.com">
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <input type="password" class="form-control"
                                                                    value="Password">
                                                            </div>
                                                            <div class="form-group text-left mb-5 forget-main">
                                                                <button type="submit" class="btn btn-primary">Sign Me
                                                                    In</button>
                                                                <span class="form-check d-inline-block">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="check1" name="example1">
                                                                    <label class="form-check-label"
                                                                        for="check1">Remember me</label>
                                                                </span>
                                                                <button
                                                                    class="nav-link m-auto btn tp-btn-light btn-primary forget-tab "
                                                                    id="nav-forget-tab" data-bs-toggle="tab"
                                                                    data-bs-target="#nav-forget" type="button"
                                                                    role="tab" aria-controls="nav-forget"
                                                                    aria-selected="false">Forget Password ?</button>
                                                            </div>
                                                            <div class="dz-social ">
                                                                <h5 class="form-title fs-20">Sign In With</h5>
                                                                <ul
                                                                    class="dz-social-icon dz-border dz-social-icon-lg text-white">
                                                                    <li><a target="_blank"
                                                                            href="https://www.facebook.com/"
                                                                            class="fab fa-facebook-f btn-facebook"></a>
                                                                    </li>
                                                                    <li><a target="_blank"
                                                                            href="https://www.google.com/"
                                                                            class="fab fa-google-plus-g btn-google-plus"></a>
                                                                    </li>
                                                                    <li><a target="_blank"
                                                                            href="https://www.linkedin.com/"
                                                                            class="fab fa-linkedin-in btn-linkedin"></a>
                                                                    </li>
                                                                    <li><a target="_blank" href="https://twitter.com/"
                                                                            class="fab fa-twitter btn-twitter"></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </form>
                                                        <div class="text-center bottom">
                                                            <button class="btn btn-primary button-md btn-block"
                                                                id="nav-sign-tab" data-bs-toggle="tab"
                                                                data-bs-target="#nav-sign" type="button"
                                                                role="tab" aria-controls="nav-sign"
                                                                aria-selected="false">Create an account</button>

                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="nav-forget" role="tabpanel"
                                                        aria-labelledby="nav-forget-tab">
                                                        <form class="dz-form">
                                                            <h3 class="form-title m-t0">Forget Password ?</h3>
                                                            <div class="dz-separator-outer m-b5">
                                                                <div class="dz-separator bg-primary style-liner"></div>
                                                            </div>
                                                            <p>Enter your e-mail address below to reset your password.
                                                            </p>
                                                            <div class="form-group mb-4">
                                                                <input name="dzName" required=""
                                                                    class="form-control" placeholder="Email Address"
                                                                    type="text">
                                                            </div>
                                                            <div class="form-group clearfix text-left">
                                                                <button class=" active btn btn-primary"
                                                                    id="nav-personal-tab" data-bs-toggle="tab"
                                                                    data-bs-target="#nav-personal" type="button"
                                                                    role="tab" aria-controls="nav-personal"
                                                                    aria-selected="true">Back</button>
                                                                <button
                                                                    class="btn btn-primary float-end">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane fade" id="nav-sign" role="tabpanel"
                                                        aria-labelledby="nav-sign-tab">
                                                        <form class="dz-form py-2">
                                                            <h3 class="form-title">Sign Up</h3>
                                                            <div class="dz-separator-outer m-b5">
                                                                <div class="dz-separator bg-primary style-liner"></div>
                                                            </div>
                                                            <p>Enter your personal details below: </p>
                                                            <div class="form-group mt-3">
                                                                <input name="dzName" required=""
                                                                    class="form-control" placeholder="Full Name"
                                                                    type="text">
                                                            </div>
                                                            <div class="form-group mt-3">
                                                                <input name="dzName" required=""
                                                                    class="form-control" placeholder="User Name"
                                                                    type="text">
                                                            </div>
                                                            <div class="form-group mt-3">
                                                                <input name="dzName" required=""
                                                                    class="form-control" placeholder="Email Address"
                                                                    type="text">
                                                            </div>

                                                            <div class="form-group mt-3">
                                                                <input name="dzName" required=""
                                                                    class="form-control" placeholder="Password"
                                                                    type="password">
                                                            </div>
                                                            <div class="form-group mt-3 mb-3">
                                                                <input name="dzName" required=""
                                                                    class="form-control"
                                                                    placeholder="Re-type Your Password"
                                                                    type="password">
                                                            </div>
                                                            <div class="mb-3">
                                                                <span class="form-check float-start me-2 ">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="check2" name="example1">
                                                                    <label class="form-check-label d-unset"
                                                                        for="check2">I agree to the</label>
                                                                </span>
                                                                <label><a href="#">Terms of Service </a>&amp; <a
                                                                        href="#">Privacy Policy</a></label>
                                                            </div>
                                                            <div class="form-group clearfix text-left">
                                                                <button class="btn btn-primary outline gray"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#nav-personal" type="button"
                                                                    role="tab" aria-controls="nav-personal"
                                                                    aria-selected="true">Back</button>
                                                                <button
                                                                    class="btn btn-primary float-end">Submit</button>
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
                                                    <a href="javascript:void(0);">DexignZone </a> All rights
                                                    reserved.</span>
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
    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/deznav-init.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>

<!-- Mirrored from w3crm.dexignzone.com/xhtml/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Mar 2023 12:48:22 GMT -->

</html>
