<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $app_settings->app_title }} - @yield('title') </title>

    <!-- Favicons -->
    <link href="" rel="icon">
    <link href="" rel="apple-touch-icon">

    <!-- Jquery js -->
    <script src="{{ asset('/') }}rioHome/assets/vendor/jquery/jquery-3.6.4.min.js"></script>

    <!-- DatePicker  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/') }}rioHome/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}rioHome/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('/') }}rioHome/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('/') }}rioHome/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}rioHome/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Checkout CSS File -->
    <link href="{{ asset('/') }}rioHome/assets/css/checkout.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('/') }}rioHome/assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/') }}rioHome/assets/css/style.css">

    @yield('style')
</head>
<body>

<!-- ======= Header ======= -->
<header id="header" class="neumo-head header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <a href="#" class="logo d-flex align-items-center me-auto me-lg-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
{{--            <img src="{{ asset($app_settings->app_logo) }}" alt="">--}}
            <h1 class="text-uppercase">{{ $app_settings->app_title }}<span>.</span></h1>
        </a>

        <nav id="navbar" class="navbar">
            @yield('nav-links')
        </nav><!-- .navbar -->

        <div class="d-flex align-items-center justify-content-between me-auto me-lg-0">
{{--            <a class="btn-book-a-table me-3" href="#book-a-table">Book a Table</a>--}}

            @if(count($items) != 0)
                <button type="button" class="btn btn-sm border-1 border-danger position-relative" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <i class="bi bi-cart4" style="font-size: 20px;"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{  count($items)  }}+
                    <span class="visually-hidden">unread messages</span>
                </span>
                </button>
            @else
                <button type="button" class="btn btn-sm border-1 border-danger position-relative">
                    <i class="bi bi-cart4" style="font-size: 20px;"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    0
                    <span class="visually-hidden">unread messages</span>
                </span>
                </button>
            @endif

        </div>
        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
</header ><!-- End Header -->

<main>
    @yield('main-content')
</main>

<!-- ======= Footer ======= -->
<footer class="text-center py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    &copy; Copyright <strong><span>RIO</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    Designed by <a href="#">Abdullah Al Mamun</a>
                </div>
            </div>
        </div>
    </div>
</footer><!-- End Footer -->

<!-- ======= Cart Items ======= -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Your cart</h5>
        <button type="button" class="btn-close btn-light" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body bg-dark">
        <div class="h-100 w-100  d-flex align-items-start flex-column">
            <div class="p-2">
                <div class="master-container">

                    @foreach( $categories as $category )
                        @foreach($items as $itemCheck)
                            @if( $category->id === $itemCheck->category_id )
                                <div class="card cart">
                                    <label class="title text-capitalize">
                                        {{ $category->name }}
                                    </label>
                                    <div class="products">
                                        @foreach( $items as $item )
                                            @if( $category->id === $item->category_id )
                                                <div class="product">
                                                    <img src="{{ asset($item->product->image) }}" alt="" class="img-thumbnail p-1 h-50 w-50"/>
                                                    <div>
                                                        <span>{{ $item->product->name }}</span>
                                                        <p>Extra Spicy</p>
                                                        <p>No mayo</p>
                                                    </div>
                                                    <div class="quantity">
                                                        <button>
                                                            <svg fill="none" viewBox="0 0 24 24" height="14" width="14" xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" stroke="#47484b" d="M20 12L4 12"></path>
                                                            </svg>
                                                        </button>
                                                        <label>{{ $item->product_qty }}</label>
                                                        <button>
                                                            <svg fill="none" viewBox="0 0 24 24" height="14" width="14" xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" stroke="#47484b" d="M12 4V20M20 12H4"></path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    @php
                                                        $sub_total  +=  $item->product->sale_price * $item->product_qty
                                                    @endphp
                                                    <label class="price small">{{ $item->product->sale_price * $item->product_qty  }}$</label>
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

            <div class="mt-auto p-2">
                <div class="master-container">
                    <div class="card coupons">
                        <label class="title">Apply Coupons</label>
                        <form class="form" action="{{ route('cart-coupon') }}"  method="post">
                            @csrf

                            <input type="text" name="code" placeholder="Apply your coupons here" class="input_field">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="card checkout">
                        <label class="title">Checkout</label>
                        <div class="details">
                            <span>Your cart subtotal:</span>
                            <span>{{ $sub_total }}$</span>
                            <span>Discount through applied coupon:</span>

                                @if($cart_coupon)
                                    @if($cart_coupon->coupon->status == 1)
                                        @if($cart_coupon->coupon->calculation == 1)
                                            <span>{{ $cart_coupon->coupon->price }}%</span>
                                        @else
                                            <span>{{ $cart_coupon->coupon->price }}$</span>
                                        @endif
                                    @else
                                        <span>0$</span>
                                    @endif
                                @else
                                    <span>0$</span>
                                @endif

                            <span>Shipping fees:</span>
                            <span>4.99$</span>
                        </div>
                        <div class="checkout--footer">

                            @if($cart_coupon)
                                @if($cart_coupon->coupon->status == 1)
                                    @if($cart_coupon->coupon->calculation == 1)
                                        @php
                                            $price = $cart_coupon->coupon->price / 100;
                                            $discount = $price * $sub_total;
                                            $total = ( ($sub_total + (4.99)) - $discount ); // According to Percentage
                                        @endphp
                                    @else
                                        @php
                                            $total = ( ($sub_total + (4.99)) - $cart_coupon->coupon->price ) // According to Addition
                                        @endphp
                                    @endif
                                @else
                                    @php
                                        $total =  $total = ($sub_total + (4.99) )
                                    @endphp
                                @endif
                            @else
                                @php
                                    $total = ($sub_total + (4.99) )
                                @endphp
                            @endif

                            <label class="price"><sup>$</sup>{{  $total  }}</label>
                            <a href="{{ route('checkout') }}"  class="checkout-btn">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ======= Cart Items Ends ======= -->

<!-- Vendor JS Files -->
{{--<script src="{{ asset('/') }}rioHome/assets/vendor/jquery/jquery-3.6.4.min.js"></script>--}}
<script src="{{ asset('/') }}rioHome/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/') }}rioHome/assets/vendor/aos/aos.js"></script>
<script src="{{ asset('/') }}rioHome/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="{{ asset('/') }}rioHome/assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="{{ asset('/') }}rioHome/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="{{ asset('/') }}rioHome/assets/vendor/php-email-form/validate.js"></script>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<!-- Checkout JS File -->
<script src="{{ asset('/') }}rioHome/assets/js/checkout.js"></script>

<!-- Main JS File -->
<script src="{{ asset('/') }}rioHome/assets/js/main.js"></script>

@yield('script')

</body>
</html>
