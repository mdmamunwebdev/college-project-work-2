<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="text-uppercase">{{ $app_settings->app_title }} || @yield("title")</title>

    <!-- Boxicons CDN Link -->
    <link href="{{ asset('/') }}rioAdmin/assets/css/boxicons.min.css" rel="stylesheet">

    <!-- Bootstrap 5 CSS & Icons  -->
    <link rel="stylesheet" href="{{ asset('/') }}rioAdmin/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="{{ asset('/') }}rioAdmin/assets/css/bootstrap-icons.css" rel="stylesheet">

    <!-- DatePicker  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">

    <!-- include summernote css -->
    <link href="{{ asset('/') }}rioAdmin/assets/css/summernote-lite.min.css" rel="stylesheet">

    <link href="{{ asset('/') }}rioAdmin/assets/css/remixicon.css" rel="stylesheet">

    <!-- Aos Animation -->
    <link href="{{ asset('/') }}rioAdmin/assets/css/aos.css" rel="stylesheet">

    <!--  Datatable CSS  -->
    <link href="{{ asset('/') }}rioAdmin/assets/css/datatables.min.css" rel="stylesheet">
    {{--    <link href="{{ asset('/') }}rioAdmin/assets/css/buttons.bootstrap5.min.css" rel="stylesheet">--}}

    <!--  Dashboard CSS  -->
    <link rel="stylesheet" href="{{ asset('/') }}rioAdmin/assets/css/dashboard.inner.css">
    <link rel="stylesheet" href="{{ asset('/') }}rioAdmin/assets/css/dashboard.sidebar.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}rioAdmin/assets/css/app.css">

    @yield('style')

</head>
<body>

<!-- Sidebar start -->
<div class="sidebar h-100 position-fixed ">
    <!-- Logo Details of sidebar start -->
    <div class="logo-details w-100 d-flex align-items-center">
        <a href="{{ route('admin.dashboard') }}" class="nav-link">
            <i class='bx bxs-registered text-center'></i>
        </a>
        <span class="logo_name fw-bold">
            <a href="{{ route('admin.dashboard') }}" class="nav-link text-uppercase">{{ $app_settings->app_title }}</a>
        </span>
    </div> <!-- Logo Details of sidebar end -->

    <!-- Sidebar Link start -->

    @yield('sidebar-links')

    <!-- Sidebar Link end -->
</div><!--  Sidebar end -->

<!--  Main content start -->
<section class="main-section position-relative" id="mainSection">
    <nav class="navbar navbar-expand">
        <div class="container-fluid">
            <i class='bx bx-menu fw-bold me-5 neumo-primary p-2'  style="font-size: 20px"></i>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav header-nav ms-auto mb-2 mb-lg-0">
{{--                    <li class="nav-item dropdown pe-3">--}}
{{--                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"--}}
{{--                           data-bs-toggle="dropdown"> <i--}}
{{--                                class="bi bi-chat-left-text rounded-circle neumo-primary py-1 px-2 border-neumo"></i>--}}
{{--                            <span class="badge bg-success badge-number">3</span> </a>--}}
{{--                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages neumo-primary">--}}
{{--                            <li class="dropdown-header"> You have 3 new messages <a href="#"><span--}}
{{--                                        class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a></li>--}}
{{--                            <li>--}}
{{--                                <hr class="dropdown-divider">--}}
{{--                            </li>--}}
{{--                            <li class="message-item">--}}
{{--                                <a href="#">--}}
{{--                                    <img src="{{ asset('/') }}rioAdmin/assets/img/messages-1.jpg" alt=""--}}
{{--                                         class="rounded-circle">--}}
{{--                                    <div>--}}
{{--                                        <h4>Jassa</h4>--}}
{{--                                        <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>--}}
{{--                                        <p>4 hrs. ago</p>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <hr class="dropdown-divider">--}}
{{--                            </li>--}}
{{--                            <li class="message-item">--}}
{{--                                <a href="#">--}}
{{--                                    <img src="{{ asset('/') }}rioAdmin/assets/img/messages-2.jpg" alt=""--}}
{{--                                         class="rounded-circle">--}}
{{--                                    <div>--}}
{{--                                        <h4>Jassa</h4>--}}
{{--                                        <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>--}}
{{--                                        <p>6 hrs. ago</p>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <hr class="dropdown-divider">--}}
{{--                            </li>--}}
{{--                            <li class="message-item">--}}
{{--                                <a href="#">--}}
{{--                                    <img src="{{ asset('/') }}rioAdmin/assets/img/messages-3.jpg" alt=""--}}
{{--                                         class="rounded-circle">--}}
{{--                                    <div>--}}
{{--                                        <h4>Jassa</h4>--}}
{{--                                        <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>--}}
{{--                                        <p>8 hrs. ago</p>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <hr class="dropdown-divider">--}}
{{--                            </li>--}}
{{--                            <li class="dropdown-footer"><a href="#">Show all messages</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
                    <li class="nav-item dropdown pe-3">
                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                           data-bs-toggle="dropdown"> <i
                                class="bi bi-bell rounded-circle neumo-primary py-1 px-2 border-neumo"></i>
                            <span class="badge bg-primary badge-number">4</span> </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications neumo-primary">
                            <li class="dropdown-header"> You have 4 new notifications <a href="#"><span
                                        class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="notification-item">
                                <i class="bi bi-exclamation-circle text-warning"></i>
                                <div>
                                    <h4>Lorem Ipsum</h4>
                                    <p>Quae dolorem earum veritatis oditseno</p>
                                    <p>30 min. ago</p>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="notification-item">
                                <i class="bi bi-x-circle text-danger"></i>
                                <div>
                                    <h4>Atque rerum nesciunt</h4>
                                    <p>Quae dolorem earum veritatis oditseno</p>
                                    <p>1 hr. ago</p>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="notification-item">
                                <i class="bi bi-check-circle text-success"></i>
                                <div>
                                    <h4>Sit rerum fuga</h4>
                                    <p>Quae dolorem earum veritatis oditseno</p>
                                    <p>2 hrs. ago</p>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="notification-item">
                                <i class="bi bi-info-circle text-primary"></i>
                                <div>
                                    <h4>Dicta reprehenderit</h4>
                                    <p>Quae dolorem earum veritatis oditseno</p>
                                    <p>4 hrs. ago</p>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="dropdown-footer"><a href="#">Show all notifications</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown ps-4 pe-3">
                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                           data-bs-toggle="dropdown"> <img src="{{ asset( Auth::guard('admin')->user()->image ) }}"
                                                           alt="Profile"
                                                           class="rounded-circle neumo-primary p-1 border-neumo">
                            <span
                                class="d-none d-md-block dropdown-toggle ps-2 text-neumo text-capitalize">{{ Auth::guard('admin')->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile neumo-primary">
                            <li class="dropdown-header">
                                <h6 class="text-capitalize">{{ Auth::guard('admin')->user()->name }}</h6>
                                <span>Web Developer</span>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('account.settings-form') }}"> <i class="bi bi-gear"></i>
                                    <span>Account Settings</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href=""
                                   onclick="event.preventDefault(); document.getElementById('logout').submit();"> <i
                                        class="bi bi-box-arrow-right"></i> <span>Sign Out</span> </a>
                                <form action="{{ route('admin.logout') }}" method="post" id="logout">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="main-content  container-fluid" id="mainContent">

        @yield('main-content')

{{--        @if($app_settings->footer_content)--}}
{{--            {!! $app_settings->footer_content !!}--}}
{{--        @else--}}
{{--            <footer id="footer" class="footer footer-extra  neumo-primary my-2">--}}
{{--                <div class="copyright text-neumo">--}}
{{--                    <script>document.write(new Date().getFullYear())</script> &copy; Copyright--}}
{{--                    <strong><span>RIO. </span></strong>  All Rights Reserved--}}
{{--                </div>--}}
{{--                <div class="credits text-neumo"> Developed By <a href="#" class="text-secondary-neumo">Abdullah Al Mamun</a></div>--}}
{{--            </footer>--}}
{{--        @endif--}}

        <footer id="footer" class="footer footer-extra  neumo-primary my-2">
            <div class="copyright text-neumo">
                <script>document.write(new Date().getFullYear())</script> &copy; Copyright
                <strong><span>RIO. </span></strong>  All Rights Reserved
            </div>
            <div class="credits text-neumo"> Developed By <a href="#" class="text-secondary-neumo">Abdullah Al Mamun</a></div>
        </footer>
        
    </div>
</section><!--  Main content end -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center neumo-primary"><i class="bi bi-arrow-up-short"></i></a>

<script src="{{ asset('/') }}rioAdmin/assets/js/jquery-3.6.4.min.js"></script>
<script src="{{ asset('/') }}rioAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script src="{{ asset('/') }}rioAdmin/assets/js/apexcharts.min.js"></script>
<script src="{{ asset('/') }}rioAdmin/assets/js/chart.min.js"></script>
<script src="{{ asset('/') }}rioAdmin/assets/js/echarts.min.js"></script>

<script src="{{ asset('/') }}rioAdmin/assets/js/datatables.min.js"></script>
<script src="{{ asset('/') }}rioAdmin/assets/js/pdfmake.min.js"></script>
<script src="{{ asset('/') }}rioAdmin/assets/js/vfs_fonts.js"></script>
<script src="{{ asset('/') }}rioAdmin/assets/js/jszip.min.js"></script>

<script src="{{ asset('/') }}rioAdmin/assets/js/tinymce.min.js"></script>
<script src="{{ asset('/') }}rioAdmin/assets/js/validate.js"></script>

<script src="{{ asset('/') }}rioAdmin/assets/js/aos.js"></script>

<script src="{{ asset('/') }}rioAdmin/assets/js/dashboard.inner.js"></script>
<script src="{{ asset('/') }}rioAdmin/assets/js/dashboard.sidebar.js"></script>

<!-- include summernote css/js-->
<script src="{{ asset('/') }}rioAdmin/assets/js/summernote-lite.min.js"></script>
<script src="{{ asset('/') }}rioAdmin/assets/js/app.js"></script>

<script type="text/javascript">

    AOS.init();

    /************************************* Footer ************************************/

    const mainSectionClientHeight = document.getElementById('mainSection').clientHeight;
    const mainSectionScrollHeight = document.getElementById('mainSection').scrollHeight;

    if( mainSectionClientHeight < mainSectionScrollHeight ) {
        document.getElementById('footer').classList.remove("footer-extra");
    }

    setInterval(footer, 500);

    function footer() {
        const mainSectionClientHeight = document.getElementById('mainSection').clientHeight;
        const mainSectionScrollHeight = document.getElementById('mainSection').scrollHeight;

        // console.log('Client Height = '+mainSectionClientHeight+' Scroll height = '+mainSectionScrollHeight);

        if( mainSectionClientHeight === mainSectionScrollHeight ) {
            document.getElementById('footer').classList.add("footer-extra");
        }
    }

    /************************************* Footer End ************************************/

</script>

@yield('app-scripts')

</body>
</html>
