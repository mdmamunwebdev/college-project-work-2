@extends('rioUser.master')

@section('title')
    <title>Dashboard</title>
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

        .hh-grayBox {
            /*background-color: #F8F8F8;*/
            margin-bottom: 20px;
            padding: 35px;
            margin-top: 20px;
        }
        .pt45{padding-top:45px;}
        .order-tracking{
            text-align: center;
            width: 33.33%;
            position: relative;
            display: block;
        }

        /* Order tracking */
        .order-tracking .is-complete{
            display: block;
            position: relative;
            border-radius: 50%;
            height: 30px;
            width: 30px;
            border: 0px solid #AFAFAF;
            background-color: #f7be16;
            margin: 0 auto;
            transition: background 0.25s linear;
            -webkit-transition: background 0.25s linear;
            z-index: 2;
        }
        .order-tracking .is-complete:after {
            display: block;
            position: absolute;
            content: '';
            height: 14px;
            width: 7px;
            top: -2px;
            bottom: 0;
            left: 5px;
            margin: auto 0;
            border: 0px solid #AFAFAF;
            border-width: 0px 2px 2px 0;
            transform: rotate(45deg);
            opacity: 0;
        }
        .order-tracking.completed .is-complete{
            border-color: #27aa80;
            border-width: 0px;
            background-color: #27aa80;
        }
        .order-tracking.completed .is-complete:after {
            border-color: #fff;
            border-width: 0px 3px 3px 0;
            width: 7px;
            left: 11px;
            opacity: 1;
        }
        .order-tracking p {
            /*color: #A4A4A4;*/
            font-size: 16px;
            margin-top: 8px;
            margin-bottom: 0;
            line-height: 20px;
        }
        .order-tracking p span{font-size: 14px;}
        .order-tracking.completed p{color: #30ff8d;}
        .order-tracking::before {
            content: '';
            display: block;
            height: 3px;
            width: calc(100% - 40px);
            background-color: #f7be16;
            top: 13px;
            position: absolute;
            left: calc(-50% + 20px);
            z-index: 0;
        }
        .order-tracking:first-child:before{display: none;}
        .order-tracking.completed:before{background-color: #27aa80;}

    </style>
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
                    <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="{{ route('dashboard') }}">
                        <svg class="bi"><use xlink:href="#house-fill"/></svg>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{ route('order.history') }}">
                        <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                        Orders
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{ route('product.history') }}">
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

    <div class="alert alert-success d-flex align-items-center my-5" role="alert">
        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
            Welcome to - {{ Auth::user()->name }} !
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 m-auto">
                <form class="card my-5 p-5" action="{{ route('order.track') }}" method="post">
                    @csrf

                    <div class="card-body row">
                        <label for="order_id" class="col-md-6" style="letter-spacing: 2px;">Track Your Order : </label>
                        <div class="col-md-6">
                            <input  class="form-control" type="number" min="0" name="order_id" id="order_id" placeholder="ORDER ID : 123">
                        </div>
                    </div>
                    <div class="card-body row">
                        <label for="order_id" class="col-md-6"></label>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-sm btn-outline-primary" style="letter-spacing: 2px;">TRACK</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

        <div class="card card-body container mb-5">
            <h2 class="text-center text-uppercase">Order Id : #{{ $order->id }}</h2>
            <div class="row">
                <div class="col-12 col-md-10   m-auto hh-grayBox pt45 pb20">
                    @if( $order->order_status == 0 )

                        <div class="row justify-content-between">
                            <div class="order-tracking completed">
                                <span class="is-complete bg-secondary"></span>
                                <p>Received</p>
                            </div>
                            <div class="order-tracking">
                                <span class="is-complete bg-primary"></span>
                                <p>Processing</p>
                            </div>
                            <div class="order-tracking">
                                <span class="is-complete bg-success"></span>
                                <p>Completed</p>
                            </div>
                        </div>

                    @elseif( $order->order_status == 1 )

                        <div class="row justify-content-between">
                            <div class="order-tracking completed">
                                <span class="is-complete bg-secondary"></span>
                                <p>Received</p>
                            </div>
                            <div class="order-tracking completed">
                                <span class="is-complete bg-primary"></span>
                                <p>Processing</p>
                            </div>

                            <div class="order-tracking ">
                                <span class="is-complete bg-success"></span>
                                <p>Completed</p>
                            </div>
                        </div>

                    @elseif( $order->order_status == 2 )

                        <div class="row justify-content-between">
                            <div class="order-tracking completed">
                                <span class="is-complete bg-secondary"></span>
                                <p>Received</p>
                            </div>
                            <div class="order-tracking completed">
                                <span class="is-complete bg-primary"></span>
                                <p>Processing</p>
                            </div>
                            <div class="order-tracking completed">
                                <span class="is-complete bg-success"></span>
                                <p>Completed</p>
                            </div>
                        </div>

                    @else

                        <div class="row justify-content-between">
                            <div class="order-tracking completed">
                                <span class="is-complete bg-secondary"></span>
                                <p>Received</p>
                            </div>
                            <div class="order-tracking completed">
                                <span class="is-complete bg-primary"></span>
                                <p>Processing</p>
                            </div>
                            <div class="order-tracking completed">
                                <span class="is-complete bg-danger"></span>
                                <p>Canceled</p>
                            </div>
                        </div>

                    @endif
                </div>
            </div>
        </div>

        <h2>Recent Order</h2>
        <div class="table-responsive small mb-5">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Payment Status</th>
                    <th scope="col">Order Status</th>
                    <th scope="col">Payment Method</th>
                    <th scope="col">Shipping Method</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as  $order)

                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>
                            <div class="badge bg-primary">
                                {{ $order->status }}
                            </div>
                        </td>
                        <td>{{ $order->order_status }}</td>
                        <td>{{ $order->pay_method }}</td>
                        <td>{{ $order->ship_method }}</td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
