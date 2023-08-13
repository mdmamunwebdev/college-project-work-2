@extends('rioAdmin.master')

@section('title')
    Product- Settings
@endsection

@section('sidebar-links')

    <ul class="nav-links h-100 py-3 px-2">
        <li class="mb-2 with-out-submenu ">
            <a href="{{ route('admin.dashboard') }}" class="">
                <i class='bx bx-grid-alt neumo-color'></i>
                <span class="link_name ">Dashboard</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name " href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            </ul>
        </li>
        <li class="with-submenu"> <!-- When active This link, then here is added a class (showMenu) -->
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bxl-product-hunt'></i>
                    <span class="link_name">Product</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li class="ln"><span class="link_name">Product</span></li>
                <li class="d-flex justify-content-start p-0">
                    <i class='bx bx-list-plus'></i>
                    <a href="{{ route('product.list') }}">Product List</a>
                </li> <!-- When active This link, then here is added a class (active-item) -->
                <li class="d-flex justify-content-start p-0">
                    <i class='bx bx-add-to-queue'></i>
                    <a href="{{ route('product.create') }}" class="flex-grow-1">Add Product</a>
                </li>
            </ul>
        </li>
        <li class="with-submenu"> <!-- When active This link, then here is added a class (showMenu) -->
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-collection'></i>
                    <span class="link_name">Category</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li class="ln"><span class="link_name">Category</span></li>
                <li class="d-flex justify-content-start p-0">
                    <i class='bx bx-list-plus'></i>
                    <a href="{{ route('category') }}">Category</a>
                </li> <!-- When active This link, then here is added a class (active-item) -->
            </ul>
        </li>
        <li class="with-submenu"> <!-- When active This link, then here is added a class (showMenu) -->
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bxs-coupon'></i>
                    <span class="link_name">Coupon</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li class="ln"><span class="link_name">Coupon</span></li>
                <li class="d-flex justify-content-start p-0">
                    <i class='bx bx-list-plus'></i>
                    <a href="{{ route('coupon') }}">Coupon</a>
                </li> <!-- When active This link, then here is added a class (active-item) -->
            </ul>
        </li>
        <li class="with-submenu"> <!-- When active This link, then here is added a class (showMenu) -->
            <div class="iocn-link">
                <a href="#">
                    <i class="bi bi-receipt"></i>
                    <span class="link_name">Order</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li class="ln"><span class="link_name">Order</span></li>
                <li class="d-flex justify-content-start p-0">
                    <i class='bx bx-list-plus'></i>
                    <a href="{{ route('order.list') }}">Order</a>
                </li> <!-- When active This link, then here is added a class (active-item) -->
            </ul>
        </li>
        <li class="with-submenu"> <!-- When active This link, then here is added a class (showMenu) -->
            <div class="iocn-link">
                <a href="#">
                    <i class="bi bi-person-badge"></i>
                    <span class="link_name">Customer</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li class="ln"><span class="link_name">Customer</span></li>
                <li class="d-flex justify-content-start p-0">
                    <i class='bx bx-list-plus'></i>
                    <a href="{{ route('customer.list') }}">Customer</a>
                </li> <!-- When active This link, then here is added a class (active-item) -->
                <li class="d-flex justify-content-start p-0">
                    <i class='bx bx-add-to-queue'></i>
                    <a href="{{ route('customer.create') }}" class="flex-grow-1">Add Customer</a>
                </li>
            </ul>
        </li>
        <li class="with-submenu"> <!-- When active This link, then here is added a class (showMenu) -->
            <div class="iocn-link">
                <a href="#">
                    <i class="bi bi-table"></i>
                    <span class="link_name">Table</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li class="ln"><span class="link_name">Table</span></li>
                <li class="d-flex justify-content-start p-0">
                    <i class='bx bx-list-plus'></i>
                    <a href="">Table</a>
                </li> <!-- When active This link, then here is added a class (active-item) -->
            </ul>
        </li>
        <li class="with-submenu showMenu"> <!-- When active This link, then here is added a class (showMenu) -->
            <div class="iocn-link">
                <a href="#">
                    <i class="bi bi-gear"></i>
                    <span class="link_name">Settings</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu active-item">
                <li class="ln"><span class="link_name">Settings</span></li>
                <li class="d-flex justify-content-start p-0">
                    <i class='bx bx-list-plus'></i>
                    <a href="{{ route('app.settings') }}">Settings</a>
                </li> <!-- When active This link, then here is added a class (active-item) -->
            </ul>
        </li>
    </ul>

@endsection

@section('style')
    <style>
        /*Customer Image Update Start*/
        .container-img {
            max-width: 960px;
            margin: 30px auto;
            padding: 20px;
        }
        .avatar-upload {
            position: relative;
            max-width: 205px;
            margin: 50px auto;
        }
        .avatar-upload .avatar-edit {
            position: absolute;
            right: 12px;
            z-index: 1;
            top: 10px;
        }
        .avatar-upload .avatar-edit input {
            display: none;
        }
        .avatar-upload .avatar-edit input + label {
            display: inline-block;
            width: 34px;
            height: 34px;
            margin-bottom: 0;
            border-radius: 100%;
            background: #FFFFFF;
            border: 1px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all 0.2s ease-in-out;
        }
        .avatar-upload .avatar-edit input + label:hover {
            background: #f1f1f1;
            border-color: #d6d6d6;
        }
        /*.avatar-upload .avatar-edit input + label:after {*/
        /*    content: "\f040";*/
        /*    font-family: 'FontAwesome';*/
        /*    color: #757575;*/
        /*    position: absolute;*/
        /*    top: 10px;*/
        /*    left: 0;*/
        /*    right: 0;*/
        /*    text-align: center;*/
        /*    margin: auto;*/
        /*}*/
        .avatar-upload .avatar-preview {
            width: 192px;
            height: 192px;
            position: relative;
            border-radius: 100%;
            border: 6px solid #F8F8F8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }
        .avatar-upload .avatar-preview > div {
            width: 100%;
            height: 100%;
            border-radius: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        /*Customer Image Update End*/
    </style>
@endsection

@section('main-content')

    <div class="pagetitle neumo-primary p-3 d-flex justify-content-between">
        <h1 class="lh-base">App Settings</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">App Settings</a></li>
                <li class="breadcrumb-item active">App Settings</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row mb-3 ">
            <div class="col-md-12">
                <div class="card neumo-primary">
                    <div class="card-body border-bottom">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 card-title flex-grow-1">App Settings</h5>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route("app.settings") }}" method="post" class="outer-repeater" enctype="multipart/form-data">
                            @csrf

                            <div class="row g-2">
                                <div class="col-md-4">
                                    <div class="card-body">
                                        <div class="row mb-3 dark" style="/*background: whitesmoke*/">
                                            <div class="col-md-12 mx-auto">
                                                <div class="container-img p-0">
                                                    <div class="avatar-upload">
                                                        <div class="avatar-edit">
                                                            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg"  name="app_logo"/>
                                                            <label for="imageUpload" style="background-color: #E6E7EE; box-shadow: 3px 3px 6px #b8b9be,-3px -3px 6px #fff;">
                                                                <i class="bx bx-camera position-absolute" style="top: 10px; left: 10px;"></i>
                                                            </label>
                                                        </div>
                                                        <div class="avatar-preview" style="background-color: #E6E7EE; box-shadow: 3px 3px 6px #b8b9be,-3px -3px 6px #fff; border: 6px solid #E6E7EE;">
                                                            <div id="imagePreview" style="background-image: url({{ $app_settings->app_logo != null ? asset( $app_settings->app_logo ) : 'https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png'}});">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 card-footer text-center text-uppercase fw-bold neumo-primary" style="cursor: pointer;">
                                                <label for="imageUpload" class="d-block" style="cursor: pointer;">App Logo</label>
                                            </div>
                                        </div>
                                    </div>

{{--                                    <div class="card-body my-3">--}}
{{--                                        <div class="form-check">--}}
{{--                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">--}}
{{--                                            <label class="form-check-label" for="flexCheckDefault">--}}
{{--                                                Default checkbox--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-check">--}}
{{--                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>--}}
{{--                                            <label class="form-check-label" for="flexCheckChecked">--}}
{{--                                                Checked checkbox--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <card class="card-title"><i class="bi bi-gear-fill"></i> General Settings</card>
                                        <div class="row my-3">
                                            <label for="name" class="col-md-3">Name : </label>
                                            <div class="col-md-9">
                                                <div class="card card-body neumo-primary p-0">
                                                    <input type="text" id="name" class="form-control" name="app_title" placeholder="App Title" value="{{ $app_settings->app_title }}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="shipping_fees" class="col-md-3">Shipping Fees : </label>
                                            <div class="col-md-9">
                                                <div class="card card-body neumo-primary p-0">
                                                    <input type="number" id="shipping_fees" class="form-control" name="shipping_fees" placeholder="Shipping Fees" value="{{ $app_settings->shipping_fees }}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="footer_content" class="col-md-3">Footer Content : </label>
                                            <div class="col-md-9">
                                                <div class="card card-body neumo-primary p-0">
                                                    <textarea name="footer_content" class="form-control" id="footer_content" cols="30" rows="10">
                                                        {{ $app_settings->footer_content }}
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <card class="card-title"><i class="bi bi-gear-fill"></i> Home Page Settings</card>

                                        <div class="row my-3">
                                            <label for="type_write_text" class="col-md-3">Type Writing Text : </label>
                                            <div class="col-md-9">
                                                <div class="card card-body neumo-primary p-0">
                                                    <input type="text" id="type_write_text" class="form-control" name="type_write_text" placeholder="Type Write Text" value="{{ $app_settings->type_write_text }}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="home_heading" class="col-md-3">Heading : </label>
                                            <div class="col-md-9">
                                                <div class="card card-body neumo-primary p-0">
                                                    <input type="text" id="home_heading" class="form-control" name="home_heading" placeholder="Heading" value="{{ $app_settings->home_heading }}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="home_para" class="col-md-3">Paragraph : </label>
                                            <div class="col-md-9">
                                                <div class="card card-body neumo-primary p-0">
                                                    <textarea name="home_para" class="form-control" id="home_para" cols="30" rows="10">
                                                        {{ $app_settings->home_para }}
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="food_video" class="col-md-3">Food Video Link : </label>
                                            <div class="col-md-9">
                                                <div class="card card-body neumo-primary p-0">
                                                    <input type="text" id="food_video" class="form-control" name="food_video" placeholder="Video" value="{{ $app_settings->food_video }}"/>
                                                </div>
                                            </div>
                                        </div>

                                        <card class="card-title"><i class="bi bi-gear-fill"></i> About Page Settings</card>
                                        <div class="row my-3">
                                            <label for="about_heading" class="col-md-3">Heading : </label>
                                            <div class="col-md-9">
                                                <div class="card card-body neumo-primary p-0">
                                                    <input type="text" id="about_heading" class="form-control" name="about_heading" placeholder="Heading" value="{{ $app_settings->about_heading }}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="about_hero_img" class="col-md-3">Hero Image : </label>
                                            <div class="col-md-9">
                                                <div class="card card-body neumo-primary p-0">
                                                    <input type="file" id="about_hero_img" class="form-control" name="about_hero_img"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="about_para" class="col-md-3">Paragraph : </label>
                                            <div class="col-md-9">
                                                <div class="card card-body neumo-primary p-0">
                                                    <textarea name="about_para" class="form-control" id="about_para" cols="30" rows="10">
                                                        {{ $app_settings->about_para }}
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <card class="card-title"><i class="bi bi-gear-fill"></i> Contact Us Page Settings</card>
                                        <div class="row my-3">
                                            <label for="contact_us_heading" class="col-md-3">Heading : </label>
                                            <div class="col-md-9">
                                                <div class="card card-body neumo-primary p-0">
                                                    <input type="text" id="contact_us_heading" class="form-control" name="contact_us_heading" placeholder="Heading" value="{{ $app_settings->contact_us_heading }}"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="submit" class="col-md-3"></label>
                                            <div class="d-grid d-md-flex justify-content-md-start">
                                                <input id="submit" type="submit" class="btn btn-sm btn-primary neumo-primary w-30" value="SAVE INFORMATION"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('app-scripts')
    <script type="text/javascript">

        $(document).ready(function () {
            let table = $('#example').DataTable({

                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']

            });

            table.buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
        });

        // Image Upload Preview

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });

        $('#footer_content').summernote({
            placeholder: 'Write Here Your Category Descriptions',
            tabsize: 2,
            height: 311,
            toolbar: [
                ['style', ['style']],
                // ['font', ['bold', 'underline', 'clear']],
                ['font', ['bold', 'underline']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['para', ['paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['codeview']]
            ]
        });

        $('#about_para').summernote({
            placeholder: 'Write Here Your Category Descriptions',
            tabsize: 2,
            height: 311,
            toolbar: [
                ['style', ['style']],
                // ['font', ['bold', 'underline', 'clear']],
                ['font', ['bold', 'underline']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['para', ['paragraph']],
                // ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                // ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

        $('#home_para').summernote({
            placeholder: 'Write Here Your Category Descriptions',
            tabsize: 2,
            height: 311,
            toolbar: [
                ['style', ['style']],
                // ['font', ['bold', 'underline', 'clear']],
                ['font', ['bold', 'underline']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['para', ['paragraph']],
                // ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                // ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

    </script>
@endsection
