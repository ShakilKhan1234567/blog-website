<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="brand" data-topbar-color="light">


<!-- Mirrored from myrathemes.com/dashtrap/pages-register by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Mar 2024 03:40:33 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8" />
    <title>Register & Signup | Dashtrap - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Myra Studio" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend')}}/assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{asset('backend')}}/assets/css/style.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('backend')}}/assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <script src="{{asset('backend')}}/assets/js/config.js"></script>
</head>

<body class="bg-primary d-flex justify-content-center align-items-center min-vh-100 p-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-md-5">
                <div class="card">
                    <div class="card-body p-4">

                        <div class="text-center w-75 mx-auto auth-logo mb-4">
                            <a class='logo-dark' href='index.html'>
                                <span><img src="{{asset('backend')}}/assets/images/logo-dark.png" alt="" height="22"></span>
                            </a>

                            <a class='logo-light' href='index.html'>
                                <span><img src="{{asset('backend')}}/assets/images/logo-light.png" alt="" height="22"></span>
                            </a>
                        </div>

                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="form-label" for="name">Name</label>
                                <input class="form-control" type="text" name="name" id="name" required="" placeholder="Enter your Name">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="emailaddress">Email address</label>
                                <input class="form-control" type="email" name="email" id="emailaddress" required="" placeholder="Enter your email">
                            </div>

                            <div class="form-group mb-3">
                                <a class='text-muted float-end' href='pages-recoverpw.html'><small></small></a>
                                <label class="form-label" for="password">Password</label>
                                <input class="form-control" type="password" name="password" required="" id="password" placeholder="Enter your password">
                            </div>
                            <div class="form-group mb-3">
                                <a class='text-muted float-end' href='pages-recoverpw.html'><small></small></a>
                                <label class="form-label" for="password">Password Confirmation</label>
                                <input class="form-control" type="password" required="" name="password_confirmation" id="password" placeholder="Enter your password">
                            </div>

                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary w-100" type="submit"> Sign Up </button>
                            </div>

                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-white-50">Already have an account ? <a class='text-white font-weight-medium ms-1' href='{{ route('login') }}'>Log In</a></p>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>

    <!-- App js -->
    <script src="{{asset('backend')}}/assets/js/vendor.min.js"></script>
    <script src="{{asset('backend')}}/assets/js/app.js"></script>

</body>


<!-- Mirrored from myrathemes.com/dashtrap/pages-register by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Mar 2024 03:40:33 GMT -->
</html>
