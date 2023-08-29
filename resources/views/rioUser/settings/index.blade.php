@extends('rioUser.master')

@section('title')
    <title>Dashboard- Settings</title>
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
                    <a class="nav-link d-flex align-items-center gap-2" href="{{ route('product.history') }}">
                        <svg class="bi"><use xlink:href="#cart"/></svg>
                        Products
                    </a>
                </li>
            </ul>


            <hr class="my-3">

            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 active" href="{{ route('user.account.settings') }}">
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
        <h2>General Settings</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Settings</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-8 m-auto my-5">
                <div class="card">
                    <form action="{{ route('user.account.settings.update', ['id' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body row">
                            <label for="name" class="col-md-6">Name</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="name" id="name" value="{{ Auth::user()->name }}">
                            </div>
                        </div>
                        <div class="card-body row">
                            <label for="email" class="col-md-6">Email</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="email" id="email" value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                        <div class="card-body row">
                            <label for="phone" class="col-md-6">Phone</label>
                            <div class="col-md-6">
                                <input class="form-control" type="number" min="0" name="phone" id="phone" value="{{ Auth::user()->phone }}">
                            </div>
                        </div>
                        <div class="card-body row">
                            <label for="password" class="col-md-6">Password</label>
                            <div class="col-md-6">
                                <input class="form-control"  autocomplete="new-password" type="password" name="password" id="password">
                            </div>
                        </div>
                        <div class="card-body row">
                            <label for="password" class="col-md-6">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="confirm_password" type="password" class="form-control" name="password_confirmation"/>
                            </div>
                        </div>

                        <div class="card-body row">
                            <label for="image" class="col-md-6">Image</label>
                            <div class="col-md-6">
                                <input class="form-control" type="file" name="image" id="image">
                            </div>
                        </div>
                        <div class="card-body row">
                            <label for="" class="col-md-6"></label>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-sm btn-outline-primary">SAVE INFORMATION</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
