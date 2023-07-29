@extends('rioAdmin.master')

@section('title')
    ORDER UPDATE
@endsection

@section('style')
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
@endsection

@section('sidebar-links')

    <ul class="nav-links h-100 py-3 px-2">
        <li class="mb-2 with-out-submenu">
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
                    <i class="bi bi-tag"></i>
                    <span class="link_name">Tag</span>
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
        <li class="with-submenu showMenu"> <!-- When active This link, then here is added a class (showMenu) -->
            <div class="iocn-link">
                <a href="#">
                    <i class="bi bi-receipt"></i>
                    <span class="link_name">Order</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li class="ln"><span class="link_name">Order</span></li>
                <li class="active-item d-flex justify-content-start p-0">
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
                    <span class="link_name">Cuupon</span>
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
                    <i class="bi bi-table"></i>
                    <span class="link_name">Table</span>
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
                    <i class="bi bi-graph-up"></i>
                    <span class="link_name">Analysis</span>
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
    </ul>

@endsection

@section('main-content')

    <div class="pagetitle neumo-primary p-3 d-flex justify-content-between">
        <h1 class="lh-base">Update Order</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Update Order</a></li>
                <li class="breadcrumb-item active">Order</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <form action="{{ route('order.update', ['id' => $order->id]) }}" method="post">
            @csrf

            <div class="container-fluid p-0">
                <div class="row g-3">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-body accordion neumo-primary text-primary-size"
                                     id="accordionOrderDetail">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header border-bottom border-1 border-light">
                                            <button class="accordion-button px-0 bg-neumo text-neumo" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                Order #{{ $order->id }} Detail
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show px-0"
                                             data-bs-parent="#accordionOrderDetail">
                                            <div class="accordion-body bg-neumo">
                                                <h6>General</h6>

                                                <div class="row mb-3">
                                                    <lable for="" class="col-12 mb-2">Status:</lable>
                                                    <div class="col-12">
                                                        <select name="order_status" id=""
                                                                class="form-select neumo-primary border-neumo text-primary-size">
                                                            <option>-- select any one --</option>
                                                            <option value="0" {{ $order->order_status == 0 ? 'selected' : '' }}>
                                                                Received
                                                            </option>
                                                            <option value="1" {{ $order->order_status == 1 ? 'selected' : '' }}>
                                                                Processing
                                                            </option>
                                                            <option value="2" {{ $order->order_status == 2 ? 'selected' : '' }}>
                                                                Completed
                                                            </option>
                                                            <option value="3" {{ $order->order_status == 3 ? 'selected' : '' }}>
                                                                Canceled
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="" class="col-12 mb-1">Shipping Type</label>
                                                    <div class="col-12">
                                                        <select class="form-select neumo-primary border-neumo text-primary-size"
                                                                name="ship_method" id="">
                                                            <option>-- select any one --</option>
                                                            <option value="0" {{ $order->ship_method == 0 ? 'selected' : '' }} >
                                                                Home Delivery
                                                            </option>
                                                            <option value="1" {{ $order->ship_method == 1 ? 'selected' : '' }} >
                                                                Shop Delivery
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-2 g-3">
                                                    <div class="col-md-6">
                                                        <h6 class="my-2">Billing Address</h6>
                                                        <div class="card card-body p-2 neumo-primary">

                                                            <div class="row mb-2 g-2">
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <label for="" class="col-12 mb-1">First
                                                                            Name</label>
                                                                        <div class="col-12">
                                                                            <input type="text" name="cus_firstName"
                                                                                   id="" class="form-control"
                                                                                   style="font-size: 11px; padding: 8px;"
                                                                                   value="{{ $order->cus_firstName }}"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <label for="" class="col-12 mb-1">Last
                                                                            Name</label>
                                                                        <div class="col-12">
                                                                            <input type="text" name="cus_lastName" id=""
                                                                                   class="form-control"
                                                                                   style="font-size: 11px; padding: 8px;"
                                                                                   value="{{ $order->cus_lastName }}"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <label for="" class="col-12 mb-1">Email</label>
                                                                        <div class="col-12">
                                                                            <input readonly type="email"
                                                                                   name="cus_email" id=""
                                                                                   class="form-control"
                                                                                   style="font-size: 11px; padding: 8px;"
                                                                                   value="{{ $order->email }}"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <label for="" class="col-12 mb-1">Phone
                                                                            No:</label>
                                                                        <div class="col-12">
                                                                            <input type="text" name="cus_phone" id=""
                                                                                   class="form-control"
                                                                                   style="font-size: 11px; padding: 8px;"
                                                                                   value="{{ $order->phone }}"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <label for=""
                                                                               class="col-12 mb-1">Address</label>
                                                                        <div class="col-12">
                                                                            <input type="text" name="cus_address"
                                                                                   class="form-control" id=""
                                                                                   style="font-size: 11px; padding: 8px;"
                                                                                   value="{{ $order->address }}"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <label for=""
                                                                               class="col-12 mb-1">Address2</label>
                                                                        <div class="col-12">
                                                                            <input type="text" name="cus_address2"
                                                                                   class="form-control" id=""
                                                                                   style="font-size: 11px; padding: 8px;"
                                                                                   value="{{ $order->address2 }}"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 g-2">
                                                                <div class="col-5">
                                                                    <div class="row">
                                                                        <label for=""
                                                                               class="col-12 mb-1">Country</label>
                                                                        <div class="col-12">
                                                                            <select class="form-select neumo-primary border-neumo text-primary-size"
                                                                                    name="cus_country" id="">
                                                                                <option value="0" selected>Bangladesh
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="row">
                                                                        <label for="" class="col-12 mb-1">State</label>
                                                                        <div class="col-12">
                                                                            <select class="form-select neumo-primary border-neumo text-primary-size"
                                                                                    name="cus_state" id="">
                                                                                <option value="0" selected>Rangpur
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-3">
                                                                    <div class="row">
                                                                        <label for="" class="col-12 mb-1">Zip</label>
                                                                        <div class="col-12">
                                                                            <input type="text" name="cus_zip" id=""
                                                                                   class="form-control"
                                                                                   style="font-size: 11px; padding: 8px;"
                                                                                   value="{{ $order->cus_zip }}"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 ">
                                                        <h6 class="my-2">Shipping Address</h6>
                                                        <div class="card card-body p-2 neumo-primary">

                                                            <div class="row mb-2 g-2">
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <label for="" class="col-12 mb-1">First
                                                                            Name</label>
                                                                        <div class="col-12">
                                                                            <input type="text" name="ship_firstName"
                                                                                   id="" class="form-control"
                                                                                   style="font-size: 11px; padding: 8px;"
                                                                                   value="{{ $order->ship_firstName }}"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <label for="" class="col-12 mb-1">Last
                                                                            Name</label>
                                                                        <div class="col-12">
                                                                            <input type="text" name="ship_lastName"
                                                                                   id="" class="form-control"
                                                                                   style="font-size: 11px; padding: 8px;"
                                                                                   value="{{ $order->ship_lastName }}"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <label for="" class="col-12 mb-1">Email</label>
                                                                        <div class="col-12">
                                                                            <input type="email" name="ship_email" id=""
                                                                                   class="form-control"
                                                                                   style="font-size: 11px; padding: 8px;"
                                                                                   value="{{ $order->ship_email }}"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <label for="" class="col-12 mb-1">Phone
                                                                            No:</label>
                                                                        <div class="col-12">
                                                                            <input type="text" name="ship_phone" id=""
                                                                                   class="form-control"
                                                                                   style="font-size: 11px; padding: 8px;"
                                                                                   value="{{ $order->ship_phone }}"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <label for=""
                                                                               class="col-12 mb-1">Address</label>
                                                                        <div class="col-12">
                                                                            <input type="text" class="form-control"
                                                                                   id="" name="ship_address"
                                                                                   style="font-size: 11px; padding: 8px;"
                                                                                   value="{{ $order->address }}"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <label for=""
                                                                               class="col-12 mb-1">Address2</label>
                                                                        <div class="col-12">
                                                                            <input type="text" class="form-control"
                                                                                   id="" name="ship_address2"
                                                                                   style="font-size: 11px; padding: 8px;"
                                                                                   value="{{ $order->address2 }}"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 g-2">
                                                                <div class="col-5">
                                                                    <div class="row">
                                                                        <label for=""
                                                                               class="col-12 mb-1">Country</label>
                                                                        <div class="col-12">
                                                                            <select class="form-select neumo-primary border-neumo text-primary-size"
                                                                                    name="ship_country" id="">
                                                                                <option value="0" selected>Bangladesh
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="row">
                                                                        <label for="" class="col-12 mb-1">State</label>
                                                                        <div class="col-12">
                                                                            <select class="form-select neumo-primary border-neumo text-primary-size"
                                                                                    name="ship_state" id="">
                                                                                <option value="0" selected>Rangpur
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-3">
                                                                    <div class="row">
                                                                        <label for="" class="col-12 mb-1">Zip</label>
                                                                        <div class="col-12">
                                                                            <input type="text" name="ship_zip" id=""
                                                                                   class="form-control"
                                                                                   style="font-size: 11px; padding: 8px;"
                                                                                   value="{{ $order->cus_zip }}"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card card-body accordion neumo-primary text-primary-size"
                                     id="accordionOrderCal">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header border-bottom border-1 border-light">
                                            <button class="accordion-button px-0 bg-neumo text-neumo" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                    aria-expanded="true" aria-controls="collapseTwo">
                                                Order Calculation
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse show  px-0"
                                             data-bs-parent="#accordionOrderCal">
                                            <div class="accordion-body bg-neumo">
                                                <nav>
                                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                        <button class="nav-link active" id="nav-home-tab"
                                                                data-bs-toggle="tab" data-bs-target="#nav-home"
                                                                type="button" role="tab" aria-controls="nav-home"
                                                                aria-selected="true">Calculator
                                                        </button>
                                                        <button class="nav-link" id="nav-profile-tab"
                                                                data-bs-toggle="tab" data-bs-target="#nav-profile"
                                                                type="button" role="tab" aria-controls="nav-profile"
                                                                aria-selected="false">Ordered Product
                                                        </button>
                                                    </div>
                                                </nav>
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                                         aria-labelledby="nav-home-tab" tabindex="0">

                                                        <div class="card bg-neumo neumo-primary my-2">
                                                            <div class="card-body p-3">
                                                                <div class="card-title py-0">Apply coupons</div>
                                                                <form id="coupon">
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <input type="text" name="coupon"
                                                                               placeholder="Apply your coupons here"
                                                                               class="form-control w-75"
                                                                               style="font-size: 11px; padding: 8px;"/>
                                                                        <button class="btn ms-2 bg-neumo neumo-primary flex-grow-1">
                                                                            Apply
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="card bg-neumo neumo-primary my-2">
                                                            <div class="card-body p-3">
                                                                <div class="card-title py-0">Apply Shipping Fees</div>
                                                                <form id="shipping_fees">
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <input type="number" name="coupon"
                                                                               placeholder="Apply your Shipping Fees here"
                                                                               class="form-control w-75"
                                                                               style="font-size: 11px; padding: 8px;"/>
                                                                        <button class="btn ms-2 bg-neumo neumo-primary flex-grow-1">
                                                                            Apply
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="card bg-neumo neumo-primary my-2">
                                                            <div class="card-body p-0">
                                                                <div class="p-3">
                                                                    <div class="d-flex justify-content-between align-itmes-center">
                                                                        <span>Subtotal : </span>
                                                                        <div>
                                                                            <span id="sub_total">{{ $order->subtotal }}</span>&dollar;
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between align-itmes-center">
                                                                        <span>Discount through applied coupons : </span>
                                                                        <span>{{ $order->coupon_discount }}$</span>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between align-itmes-center">
                                                                        <span>Shipping fees : </span>
                                                                        <span>{{ $order->shipping_fees }}$</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                                         aria-labelledby="nav-profile-tab" tabindex="0">

                                                        @php
                                                            $orderedProduct = $order->orderedProduct;
                                                        @endphp
                                                        <form class="my-2" method="get" id="customOrderedProduct">
                                                            <div class="row g-2">
                                                                <div class="col-4">
                                                                    <div class="row">
                                                                        <label for=""
                                                                               class="col-12 mb-1">Category</label>
                                                                        <div class="col-12">
                                                                            <select class="form-select neumo-primary border-neumo text-primary-size"
                                                                                    name="category_id" id="productCat">
                                                                                <option>-- Select Category --</option>

                                                                                @foreach($category as $categoryItem)
                                                                                    <option value="{{ $categoryItem->id }}"
                                                                                            class="text-capitalize">{{ $categoryItem->name }}</option>
                                                                                @endforeach

                                                                            </select>

                                                                            <input type="hidden" name="order_id"
                                                                                   value="{{ $order->id }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="row">
                                                                        <label for=""
                                                                               class="col-12 mb-1">Product</label>
                                                                        <div class="col-12" id="selectDiv">
                                                                            <select class="form-select neumo-primary border-neumo text-primary-size"
                                                                                    name="product_id" id="">
                                                                                <option>-- No Found Product --</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-2">
                                                                    <div class="row">
                                                                        <label for="" class="col-12 mb-1">QTY</label>
                                                                        <div class="col-12">
                                                                            <input type="number" min="1"
                                                                                   name="product_qty"
                                                                                   id="custom_product_qty"
                                                                                   class="form-control"
                                                                                   style="font-size: 11px; padding: 8px;"
                                                                                   value="1"
                                                                                   onkeyup="valueCheck(this)"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-2">
                                                                    <div class="row">
                                                                        <label for="" class="col-12 mb-1 text-end">Action</label>
                                                                        <div class="col-12 text-end">
                                                                            <button class="btn  text-success bg-neumo neumo-primary">
                                                                                &plus;
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>

                                                        <div class="d-flex justify-content-between text-dark my-2  py-1 px-3">
                                                            <span>Product name</span>
                                                            <span>QTY</span>
                                                            <span>PPP</span>
                                                            <span>Action</span>
                                                        </div>

                                                        <div id="orderedProduct">
                                                            @foreach($orderedProduct as $orderedProductItem)

                                                                <div class="d-flex justify-content-between border align-items-center border-success my-2  py-1 px-3 neumo-primary border-secondary-neumo">
                                                                    <span>{{ $orderedProductItem->product->name }}</span>
                                                                    <input type="number" min="1" name="product_qty"
                                                                           class="form-control"
                                                                           id="product_qty_{{ $orderedProductItem->id }}"
                                                                           style="font-size: 11px; padding: 8px; width: 20%"
                                                                           value="{{ $orderedProductItem->product_qty }}"
                                                                           onkeyup="productQty({{ $orderedProductItem->id }})"/>
                                                                    <span>{{ $orderedProductItem->sale_price }}</span>
                                                                    <span class="text-danger" style="cursor: pointer;"
                                                                          id="orderedProductDel"
                                                                          onclick="orderedProductDel( {{$orderedProductItem->id}} )">&cross;</span>
                                                                </div>

                                                            @endforeach
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-neumo">
                                        <div class="card card-body bg-neumo neumo-primary p-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <sup>&dollar;</sup><span id="total">{{ $order->amount }}</span>
                                                </div>
                                                <div>Total(USD)</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-body accordion neumo-primary text-primary-size"
                                     id="accordionOrderAction">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header border-bottom border-1 border-light">
                                            <button class="accordion-button px-0 bg-neumo text-neumo" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                    aria-expanded="true" aria-controls="collapseThree">
                                                Order Action
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse show  px-0"
                                             data-bs-parent="#accordionOrderAction">
                                            <div class="accordion-body bg-neumo">
                                                <div class="d-flex justify-content-between mb-2 text-neumo">
                                                    <i class="bi bi-calendar3"></i>
                                                    <span>Order Generated : </span>
                                                    <div class="neumo-primary  border-dark-neumo" style="width: 50%">
                                                        <input readonly type="text" id=""
                                                               class="p-1 border-0 text-center w-100 h-100 bg-neumo"
                                                               value="{{ $order->order_create_date }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-neumo">
                                        <div class="d-flex justify-content-end">
                                            <div>
                                                <button type="submit" id="productPublished"
                                                        class="btn btn-sm neumo-primary text-secondary-neumo border-secondary-neumo text-primary-size">
                                                    Update
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card card-body accordion neumo-primary text-primary-size"
                                     id="accordionOrderNote">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header border-bottom border-1 border-light">
                                            <button class="accordion-button px-0 bg-neumo text-neumo" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                    aria-expanded="true" aria-controls="collapseFour">
                                                Customer Notes
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse show  px-0"
                                             data-bs-parent="#accordionOrderNote">
                                            <div class="accordion-body bg-neumo">
                                           <textarea class="form-control" id="summernote5" name="cus_notes" rows="10">
                                                 {{ $order->cus_notes }}
                                           </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

@endsection

@section('app-scripts')
    <script type="text/javascript">

        let categorySelector = document.getElementById('productCat');

        categorySelector.addEventListener("change", function () {
            productCategory(categorySelector.value);
        });

        function productCategory(catVal) {
            $.ajax({
                url: '/order/product/category/' + catVal + '/' + {{$order->id}},
                type: "GET",
                success: function (response) {

                    if (response) {

                        let parentElement = document.getElementById('selectDiv');

                        while (parentElement.firstChild) {
                            parentElement.firstChild.remove();
                        }

                        let selectElement = document.createElement('select');
                        selectElement.id = '';
                        selectElement.name = 'product_id';
                        selectElement.classList.add('form-select', 'neumo-primary', 'border-neumo', 'text-primary-size');

                        if (response.product_name.length === 0) {

                            let option = document.createElement('option');
                            option.text = '-- No Found Product --';

                            selectElement.appendChild(option);
                        } else {
                            for (let i = 1; i <= response.product_name.length; i++) {

                                let option = document.createElement('option');
                                option.value = response.product_id[i - 1];
                                option.text = response.product_name[i - 1];

                                selectElement.appendChild(option);
                            }
                        }

                        parentElement.appendChild(selectElement);

                        console.log(response)
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        function productQty(orderedProductId) {

            let product_qty = $(`#product_qty_${orderedProductId}`).val();

            if (product_qty <= 0 || product_qty === '') {
                $(`#product_qty_${orderedProductId}`).val(1);
            } else {
                $.ajax({
                    url: '/ordered/product/qty-update/' + orderedProductId + '/' + product_qty,
                    type: "GET",
                    success: function (response) {

                        if (response) {

                            $('#sub_total').text(response.sub_total)
                            $('#total').text(response.total)

                            console.log(response);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

        }

        $('#customOrderedProduct').submit(function (event) {

            event.preventDefault(); // Prevent the form from submitting normally

            let formData = $(this).serialize(); // Serialize the form data

            $.ajax({
                url: "{{ route('ordered.custom.product') }}",
                type: "GET",
                data: formData,
                dataType: "json",
                success: function (response) {

                    $('#orderedProduct').append(
                        "<div class='d-flex justify-content-between border align-items-center border-success my-2  py-1 px-3 neumo-primary border-secondary-neumo'>" +
                        "<span>" + response.name + "</span>" +
                        "<input onkeyup='productQty(" + response.id + ")' type='number' min='1' name='product_qty' class='form-control' id='product_qty_" + response.id + "' style='font-size: 11px; padding: 8px; width: 20%' value=" + response.qty + " />" +
                        "<span>" + response.price + "</span>" +
                        "<span class='text-danger' style='cursor: pointer;' id='productDel' onclick='orderedProductDel(" + response.id + ")'>&cross;</span>" +
                        "</div>"
                    );

                    $('#sub_total').text(response.sub_total)
                    $('#total').text(response.total)

                    productCategory(categorySelector.value);

                    console.log(response)
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        function orderedProductDel(ordered_product_id) {

            $.ajax({
                url: '/ordered/product/delete/' + ordered_product_id + '/' + {{ $order->id }},
                type: "GET",
                success: function (response) {

                    if (response) {

                        document.getElementById('orderedProduct').innerHTML = '';

                        for (let i = 1; i <= response.name.length; i++) {

                            $('#orderedProduct').append(
                                "<div class='d-flex justify-content-between border align-items-center border-success my-2  py-1 px-3 neumo-primary border-secondary-neumo'>" +
                                "<span>" + response.name[i - 1] + "</span>" +
                                "<input onkeyup='productQty(" + response.id + ")' type='number' min='1' name='product_qty' class='form-control' id='product_qty_" + response.id + "' style='font-size: 11px; padding: 8px; width: 20%' value=" + response.qty[i - 1] + " />" +
                                "<span>" + response.price[i - 1] + "</span>" +
                                "<span class='text-danger' style='cursor: pointer;' id='orderedProductDel' onclick='orderedProductDel(" + response.id[i - 1] + ")'>&cross;</span>" +
                                "</div>"
                            );

                        }

                        $('#sub_total').text(response.sub_total)
                        $('#total').text(response.total)

                        productCategory(categorySelector.value);

                        console.log(response);
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        function valueCheck(event) {
            if ((event.value <= 0) || (event.value === '')) {
                event.value = 1;
            }
        }

        $('#summernote5').summernote({
            placeholder: 'Write Here Your Order Notes',
            tabsize: 2,
            height: 80,
            toolbar: [
                ['style', ['style']],
                // ['font', ['bold', 'underline', 'clear']],
                ['font', ['bold', 'underline']],
                ['color', ['color']],
                // ['para', ['ul', 'ol', 'paragraph']],
                ['para', ['paragraph']],
                // ['table', ['table']],
                // ['insert', ['link', 'picture', 'video']],
                // ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

    </script>
@endsection

