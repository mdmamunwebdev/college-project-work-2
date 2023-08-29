@extends('rioUser.master')

@section('title')
    <title>Dashboard- Product</title>
@endsection

@section('style')
@endsection

@section('sidebar')
    <div class="offcanvas-lg offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 " aria-current="page" href="{{ route('dashboard') }}">
                        <svg class="bi"><use xlink:href="#house-fill"/></svg>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 " href="{{ route('order.history') }}">
                        <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                        Orders
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 active" href="{{ route('product.history') }}">
                        <svg class="bi"><use xlink:href="#cart"/></svg>
                        Products
                    </a>
                </li>
            </ul>


            <hr class="my-3">

            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{ route('user.account.settings') }}">
                        <svg class="bi"><use xlink:href="#gear-wide-connected"/></svg>
                        Settings
                    </a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="post" id="logout">@csrf</form>
                    <a class="nav-link d-flex align-items-center gap-2" href="#" onclick="event.preventDefault(); document.getElementById('logout').submit();">
                        <svg class="bi"><use xlink:href="#door-closed"/></svg>
                        Sign out
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection

@section('main-content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Product History</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive small my-5">
                    <table class="table table-hover table-bordered table-dark table-striped table-sm">
                        <thead>
                        <tr>
                            <th scope="col">Product Id</th>
                            <th scope="col">Order Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Product Qty</th>
                            <th scope="col">Sale Price</th>
                            <th scope="col">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as  $order)

                            @foreach($order->orderedProduct as $orderedProduct)
                                <tr>
                                    <td>#{{ $orderedProduct->product->id }}</td>
                                    <td>#{{ $orderedProduct->order_id }}</td>
                                    <td class="text-uppercase">{{ $orderedProduct->product->name }}</td>
                                    <td>
                                        <img class="img-thumbnail" style="width: 50px; height: 50px;" src="{{ asset( $orderedProduct->product->image ) }}" alt="">
                                    </td>
                                    <td>{{ $orderedProduct->product_qty }}</td>
                                    <td>&dollar;{{ $orderedProduct->sale_price }}</td>
                                    <td>{{ $orderedProduct->order->created_at }}</td>
                                </tr>
                            @endforeach

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
