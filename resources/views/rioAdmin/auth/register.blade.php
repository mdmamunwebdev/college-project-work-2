<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Register - Admin || RIO</title>
    <meta name="robots" content="noindex, nofollow">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="{{asset('/')}}rioAdmin/assets/img/favicon.png" rel="icon">
    <link href="{{asset('/')}}rioAdmin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="{{asset('/')}}rioAdmin/assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="{{asset('/')}}rioAdmin/assets/bootstrap-icons.css" rel="stylesheet">
    <link href="{{asset('/')}}rioAdmin/assets/css/boxicons.min.css" rel="stylesheet">
    <link href="{{asset('/')}}rioAdmin/assets/css/quill.snow.css" rel="stylesheet">
    <link href="{{asset('/')}}rioAdmin/assets/css/quill.bubble.css" rel="stylesheet">
    <link href="{{asset('/')}}rioAdmin/assets/css/remixicon.css" rel="stylesheet">
    <link href="{{asset('/')}}rioAdmin/assets/css/simple-datatables.css" rel="stylesheet">
    <link href="{{asset('/')}}rioAdmin/assets/css/dashboard.inner.css" rel="stylesheet">
    <link href="{{asset('/')}}rioAdmin/assets/css/app.css" rel="stylesheet">
</head>
</head>
<body>
<main>
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="d-flex justify-content-center py-4"> <a href="#" class="logo d-flex align-items-center w-auto"> <img src="{{ asset('/') }}rioAdmin/assets/img/rio-logo.png" class="neumo-primary rounded-circle p-2 border border-danger border-1" alt=""> <span class="d-none d-lg-block text-dark">Admin</span> </a></div>

                        <div class="card mb-3 neumo-primary">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                    <p class="text-center small">Enter your personal details to create account</p>
                                </div>
                                <form class="row g-3 needs-validation" novalidate action="{{ route('admin.register') }}" method="post">

                                    @csrf

                                    <div class="col-12">
                                        <label for="yourName" class="form-label">Your Name</label> <input type="text" name="name" class="form-control" id="yourName" required>
                                        <div class="invalid-feedback">Please, enter your name!</div>
                                    </div>
                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label">Your Email</label> <input type="email" name="email" class="form-control" id="yourEmail" required>
                                        <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                    </div>
                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label> <input type="password" name="password" class="form-control" id="yourPassword" required>
                                        <div class="invalid-feedback">Please enter your password!</div>
                                    </div>
                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">ReType Password</label> <input type="password" name="password_confirmation" class="form-control" id="yourPassword" required>
                                        <div class="invalid-feedback">Please enter your password!</div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required> <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                                            <div class="invalid-feedback">You must agree before submitting.</div>
                                        </div>
                                    </div>
                                    <div class="col-12"> <button class="btn neumo-primary w-100 text-dark" type="submit">Create Account</button></div>
                                    <div class="col-12">
                                        <p class="small mb-0">Already have an account? <a href="{{ route('admin.login') }}">Log in</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="credits"> Loved by <a href="#">Abdullah Al Mamun</a></div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<script src="{{asset('/')}}rioAdmin/assets/js/apexcharts.min.js"></script>
<script src="{{asset('/')}}rioAdmin/assets/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('/')}}rioAdmin/assets/js/chart.min.js"></script>
<script src="{{asset('/')}}rioAdmin/assets/js/echarts.min.js"></script>
<script src="{{asset('/')}}rioAdmin/assets/js/quill.min.js"></script>
<script src="{{asset('/')}}rioAdmin/assets/js/simple-datatables.js"></script>
<script src="{{asset('/')}}rioAdmin/assets/js/tinymce.min.js"></script>
<script src="{{asset('/')}}rioAdmin/assets/js/validate.js"></script>
<script src="{{asset('/')}}rioAdmin/assets/js/dashboard.inner.js"></script>
</body>
</html>
