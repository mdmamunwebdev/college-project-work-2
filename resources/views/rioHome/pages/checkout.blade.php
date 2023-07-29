@extends('rioHome.master')

@section('title')
    Checkout
@endsection

@section('nav-links')
    <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('our-foods') }}" class="active">Menu</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#events">Events</a></li>
        <li><a href="#chefs">Chefs</a></li>
        <li><a href="#gallery">Gallery</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>
@endsection

@section('style')
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }
    </style>
@endsection

@section('main-content')
    <div class="container">
        <main id="main" class="main">
            <div class="py-5 text-center">
                <h2>Checkout form</h2>
                <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required
                    form group has a validation state that can be triggered by attempting to submit the form without
                    completing it.</p>
            </div>

            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <div class="h-100 w-100  d-flex align-items-start flex-column">
                        <div class="p-2">
                            <div class="master-container">
                                <h4 class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="text-primary">Your cart</span>
                                    <span class="badge bg-primary rounded-pill">3</span>
                                </h4>

                                @foreach( $categories as $category )
                                    @foreach($items as $itemCheck)
                                        @if( $category->id === $itemCheck->category_id )
                                            <div class="card cart">
                                                <label class="title text-capitalize">{{ $category->name }}</label>
                                                <div class="products">
                                                    @foreach( $items as $item )
                                                        @if( $category->id === $item->category_id )
                                                            <div class="product">
                                                                <img src="{{ asset($item->product->image) }}" alt=""
                                                                     class="img-thumbnail p-1 h-50 w-75"/>
                                                                <div>
                                                                    <span>{{ $item->product->name }}</span>
                                                                    <p>Extra Spicy</p>
                                                                    <p>No mayo</p>
                                                                </div>
                                                                <div class="quantity">
                                                                    <button>
                                                                        <svg fill="none" viewBox="0 0 24 24" height="14"
                                                                             width="14"
                                                                             xmlns="http://www.w3.org/2000/svg">
                                                                            <path stroke-linejoin="round"
                                                                                  stroke-linecap="round"
                                                                                  stroke-width="2.5" stroke="#47484b"
                                                                                  d="M20 12L4 12"></path>
                                                                        </svg>
                                                                    </button>
                                                                    <label>{{ $item->product_qty }}</label>
                                                                    <button>
                                                                        <svg fill="none" viewBox="0 0 24 24" height="14"
                                                                             width="14"
                                                                             xmlns="http://www.w3.org/2000/svg">
                                                                            <path stroke-linejoin="round"
                                                                                  stroke-linecap="round"
                                                                                  stroke-width="2.5" stroke="#47484b"
                                                                                  d="M12 4V20M20 12H4"></path>
                                                                        </svg>
                                                                    </button>
                                                                </div>

                                                                @php
                                                                    $sub_total  +=  $item->product->sale_price * $item->product_qty
                                                                @endphp

                                                                <label class="price small">{{ $item->product->sale_price * $item->product_qty }}&dollar;</label>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            @break
                                        @endif
                                    @endforeach
                                @endforeach

                            </div>
                        </div>

                        <div class="p-2">
                            <div class="master-container">
                                <div class="card checkout">
                                    <label class="title">Checkout</label>
                                    <div class="details">
                                        <span>Your cart subtotal:</span>
                                        <span>{{ $sub_total }}&dollar;</span>
                                        <span>Discount through applied coupons:</span>
                                        <span>3.99$</span>
                                        <span>Shipping fees:</span>
                                        <span>4.99$</span>
                                    </div>
                                    <div class="checkout--footer">
                                        @php
                                            $total =  ($sub_total + ((4.99) - (3.99)))
                                        @endphp
                                        <label class="price"><sup>$</sup>{{ $total }}</label>
                                        <div class="btn">Total (USD)</div>
                                    </div>
                                </div>
                                <div class="card coupons">
                                    <label class="title">Apply coupons</label>
                                    <form class="form">
                                        <input type="text" placeholder="Apply your coupons here" class="input_field">
                                        <button>Apply</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Billing address</h4>
                    <form class="needs-validationn" novalidate action="{{ url('/pay') }}" method="POST">
                        @csrf

                        <input type="hidden" class="form-control" id='amount' name="amount" placeholder=""
                               value="{{  $total }}" required/>
                        <input type="hidden" class="form-control" id='subtotal' name="subtotal" placeholder=""
                               value="{{  $sub_total }}" required/>
                        <input type="hidden" class="form-control" id='coupon' name="coupon" placeholder=""
                               value="{{ 0 }}" required/>
                        <input type="hidden" class="form-control" id='coupon_discount' name="coupon_discount"
                               placeholder="" value="{{ 3.99 }}" required/>
                        <input type="hidden" class="form-control" id='shipping_fees' name="shipping_fees" placeholder=""
                               value="{{ 4.99 }}" required/>

                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="cus_firstName" class="form-label">First name</label>
                                <input type="text" class="form-control" id="cus_firstName" name="cus_firstName"
                                       placeholder=""/>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="cus_lastName" class="form-label">Last name</label>
                                <input type="text" class="form-control" id="cus_lastName" name="cus_lastName"
                                       placeholder=""/>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="cus_username" class="form-label">Username</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="cus_username" name="cus_username"
                                           placeholder="Username">
                                    <div class="invalid-feedback">
                                        Your username is required.
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="cus_email" class="form-label">Email <sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control" id="cus_email" name="cus_email"
                                       placeholder="you@example.com">
                                <div class="invalid-feedback {{$errors->has('cus_email') ? 'd-block' : ''}}">
                                    <span class="text-danger">{{$errors->has('cus_email') ? $errors->first('cus_email') : ''}}</span>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="cus_phone" class="form-label">Phone <sup class="text-danger">*</sup></label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">+88</span>
                                    <input type="text" class="form-control" id="cus_phone" name="cus_phone"
                                           placeholder="01710000000"/>
                                    <div class="invalid-feedback {{$errors->has('cus_phone') ? 'd-block' : ''}}">
                                        <span class="text-danger">{{$errors->has('cus_phone') ? $errors->first('cus_phone') : ''}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="cus_address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="cus_address" name="cus_address"
                                       placeholder="1234 Main St"/>
                                <div class="invalid-feedback">
                                    Please enter your billing address.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="cus_address2" class="form-label">Address 2 <span
                                            class="text-body-secondary">(Optional)</span></label>
                                <input type="text" class="form-control" id="cus_address2" name="cus_address2"
                                       placeholder="Apartment or suite"/>
                            </div>

                            <div class="col-md-3">
                                <label for="cus_country" class="form-label">Country</label>
                                <select class="form-select" id="cus_country" name="cus_country">
                                    <option disabled>Choose...</option>
                                    <option value="0" selected>Bangladesh</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid country.
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="cus_state" class="form-label">State</label>
                                <select class="form-select" id="cus_state" name="cus_state">
                                    <option disabled>Choose...</option>
                                    <option value="0" selected>Rangpur</option>
                                    <option value="1">Dhaka</option>
                                    <option value="2">Khulna</option>
                                    <option value="3">Kumilla</option>
                                    <option value="4">Raghshahi</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>

                            <div class="col-md-2">
                                <label for="cus_zip" class="form-label">Zip</label>
                                <input type="text" class="form-control" id="cus_zip" name="cus_zip" placeholder="">
                                <div class="invalid-feedback">
                                    Zip code required.
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="ship_method" class="form-label">Shipping Type</label>
                                <select class="form-select" id="ship_method" name="ship_method">
                                    <option disabled>Choose...</option>
                                    <option value="0" selected>Home Delivery</option>
                                    <option value="1">Shop Delivery</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>

                        </div>

                        <hr class="my-4">

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="same-address" name="same_address"
                                   value="sameAddr" onclick="shippingAddress()" data-bs-toggle="collapse"
                                   data-bs-target="#collapseShipping" aria-expanded="false"
                                   aria-controls="collapseShipping"/>
                            <label class="form-check-label" for="same-address">Shipping address is the same as my
                                billing address</label>
                        </div>

                        <div class="collapse show mt-3" id="collapseShipping">
                            <h4 class="mb-3">Shipping address</h4>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="ship_firstName" class="form-label">First name</label>
                                    <input type="text" class="form-control" id="ship_firstName" name="ship_firstName"
                                           placeholder=""/>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="ship_lastName" class="form-label">Last name</label>
                                    <input type="text" class="form-control" id="ship_lastName" name="ship_lastName"
                                           placeholder=""/>
                                    <div class="invalid-feedback">
                                        Valid last name is required.
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="ship_email" class="form-label">Email <sup
                                                class="text-danger">*</sup></label>
                                    <input type="text" class="form-control" id="ship_email" name="ship_email"
                                           placeholder="you@example.com"/>
                                    <div class="invalid-feedback {{$errors->has('ship_email') ? 'd-block' : ''}}">
                                        <span class="text-danger">{{$errors->has('ship_email') ? $errors->first('ship_email') : ''}}</span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="ship_phone" class="form-label">Phone <sup
                                                class="text-danger">*</sup></label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text">+88</span>
                                        <input type="text" class="form-control" id="ship_phone" name="ship_phone"
                                               placeholder="01710000000"/>
                                        <div class="invalid-feedback {{$errors->has('ship_phone') ? 'd-block' : ''}}">
                                            <span class="text-danger">{{$errors->has('ship_phone') ? $errors->first('ship_phone') : ''}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="ship_address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="ship_address" name="ship_address"
                                           placeholder="1234 Main St"/>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="ship_address2" class="form-label">Address 2 <span
                                                class="text-body-secondary">(Optional)</span></label>
                                    <input type="text" class="form-control" id="ship_address2" name="ship_address2"
                                           placeholder="Apartment or suite"/>
                                </div>

                                <div class="col-md-5">
                                    <label for="ship_country" class="form-label">Country</label>
                                    <select class="form-select" id="ship_country" name="ship_country" disabled>
                                        <option>Choose...</option>
                                        <option value="0" selected>Bangladesh</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid country.
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="ship_state" class="form-label">State</label>
                                    <select class="form-select" id="ship_state" name="ship_state" disabled>
                                        <option>Choose...</option>
                                        <option value="0" selected>Rangpur</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide a valid state.
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label for="ship_zip" class="form-label">Zip</label>
                                    <input type="text" class="form-control" id="ship_zip" name="ship_zip"
                                           placeholder=""/>
                                    <div class="invalid-feedback">
                                        Zip code required.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <h4 class="mb-3">Payment</h4>

                        <div class="my-3">
                            <div class="form-check ">
                                <input id="bkash" name="paymentMethod" value="0" type="radio" class="form-check-input"
                                       required>
                                <label class="form-check-label" for="bkash">Bkash</label>
                            </div>
                            <div class="form-check ">
                                <input id="rocket" name="paymentMethod" value="1" type="radio" class="form-check-input"
                                       required>
                                <label class="form-check-label" for="rocket">Rocket</label>
                            </div>
                            <div class="form-check ">
                                <input id="nagad" name="paymentMethod" value="2" type="radio" class="form-check-input"
                                       required>
                                <label class="form-check-label" for="nagad">Nagad</label>
                            </div>
                            <div class="form-check">
                                <input id="cashOn" name="paymentMethod" value="3" type="radio" class="form-check-input"
                                       checked required>
                                <label class="form-check-label" for="cashOn">Cash On</label>
                            </div>
                        </div>

                        <hr class="my-4">

                        <button id="placeOrder" class="btn btn-primary btn-lg btn-block" style="font-size: 12px;"
                                type="submit">Place Order
                        </button>
                    </form>
                </div>
            </div>
        </main>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
@endsection

