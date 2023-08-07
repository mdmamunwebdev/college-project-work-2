<ul class="nav nav-tabs d-flex justify-content-center neumo-active" data-aos="fade-up"
    data-aos-delay="200">

    @foreach( $categories as $category)
        @if( $loop->iteration === 1 )
            <li class="nav-item">
                <a class="nav-link active  show px-3" data-bs-toggle="tab"
                   data-bs-target="#menu-{{ $category->name }}">
                    <h4 class="text-capitalize">{{ $category->name }}</h4>
                </a>
            </li><!-- End tab nav item -->
        @else
            <li class="nav-item">
                <a class="nav-link  show px-3" data-bs-toggle="tab"
                   data-bs-target="#menu-{{ $category->name }}">
                    <h4 class="text-capitalize">{{ $category->name }}</h4>
                </a>
            </li><!-- End tab nav item -->
        @endif
    @endforeach

</ul>

<div class="tab-content" data-aos="fade-up" data-aos-delay="300">

    @foreach($categories as $category)

        @if( $loop->iteration === 1 )

            <div class="tab-pane fade active show" id="menu-{{ $category->name }}">

                <div class="tab-header text-center">
                    <p>Menu</p>
                    <h3>{{ $category->name }}</h3>
                </div>
                <div class="row g-3">
                    @foreach( $category->productCategory as $products)
                        <div class="col-lg-3 m-auto menu-item">
                            <div class="card card-body neumorphism" style="width: auto;">
                                <a href="{{ asset($products->product->image) }}" class="glightbox "><img
                                        src="{{ asset($products->product->image) }}"
                                        class="menu-img neumo-foods img-fluid" alt=""/></a>
                                <h4 style="font-size: 17px;">{{ $products->product->name }}</h4>
                                <p class="ingredients mb-3" style="font-size: 12px;">
                                    Lorem, deren, trataro, filede, nerada
                                </p>
                                <div class="btn btn-sm price neumo-foods-price-btn w-50 m-auto">
                                    @php
                                        $earlier = new DateTime($products->product->start_sale_price_date);
                                        $later = new DateTime($products->product->end_sale_price_date);

                                        $date_remain = $earlier->diff($later)->format("%r%a"); //3
                                    @endphp

                                    @if( $date_remain > 0 )
                                        <strike style="color: black">&dollar;{{ $products->product->regular_price }} </strike>
                                        /&dollar;{{ $products->product->sale_price }}
                                    @else
                                        <span style="color: black">&dollar;{{ $products->product->regular_price }} </span>
                                    @endif
                                </div>
                                <form action="{{ route('cart.add') }}"
                                      id="cartForm-{{ $products->product->id }}-{{ $category->id }}"
                                      method="get">

                                    <div class="row g-2 mt-2">
                                        <div class="col-md-3 mt-2">
                                            <input type="text" name="product_id" id=""
                                                   value="{{ $products->product->id }}" hidden/>
                                            <input type="text" name="category_id" id=""
                                                   value="{{ $category->id }}" hidden/>
                                            <input class="form-control neumo-input p-1" type="number"
                                                   name="product_qty" id="" value="1" placeholder="1"
                                                   style="font-size: 12px"/>
                                        </div>
                                        <div class="col-md-9 mt-2">
                                            <button type="submit"
                                                    class="btn btn-sm neumo-foods-cart-btn w-100 fw-bolder"
                                                    style="font-size: 15px;">
                                                <i class="bi bi-cart4 me-1"></i>
                                                ADD TO CARD
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div><!-- Menu Item -->

                        <script>
                            {{--$(document).ready(function() {--}}
                            {{--    $("#cartForm-{{ $products->product->id }}-{{ $category->id }}").submit(function(event) {--}}
                            {{--        // Stop the form from submitting normally--}}
                            {{--        event.preventDefault();--}}

                            {{--        // Serialize the form data--}}
                            {{--        let formData = $("#cartForm-{{ $products->product->id }}-{{ $category->id }}").serialize();--}}

                            {{--        // Submit the form data using AJAX--}}
                            {{--        $.ajax({--}}
                            {{--            type: 'GET',--}}
                            {{--            url: '/cart/add',--}}
                            {{--            data: formData,--}}
                            {{--            success: function(response) {--}}

                            {{--                    alert(response);--}}

                            {{--            },--}}
                            {{--            error: function(xhr, status, error) {--}}
                            {{--                alert('Error submitting form: ' + error);--}}
                            {{--            }--}}
                            {{--        });--}}
                            {{--    });--}}
                            {{--});--}}
                        </script>
                    @endforeach
                </div>
            </div><!-- End {{ $category->name }} Menu Content -->

        @else

            <div class="tab-pane fade show" id="menu-{{ $category->name }}">

                <div class="tab-header text-center">
                    <p>Menu</p>
                    <h3>{{ $category->name }}</h3>
                </div>
                <div class="row g-3">
                    @foreach( $category->productCategory as $products)
                        <div class="col-lg-3 m-auto menu-item">
                            <div class="card card-body neumorphism" style="width: auto;">
                                <a href="{{ asset($products->product->image) }}" class="glightbox "><img
                                        src="{{ asset($products->product->image) }}"
                                        class="menu-img neumo-foods img-fluid" alt=""/></a>
                                <h4 style="font-size: 17px;">{{ $products->product->name }}</h4>
                                <p class="ingredients mb-3" style="font-size: 12px;">
                                    Lorem, deren, trataro, filede, nerada
                                </p>
                                <div class="btn btn-sm price neumo-foods-price-btn w-50 m-auto">
                                    @php
                                        $earlier = new DateTime($products->product->start_sale_price_date);
                                        $later = new DateTime($products->product->end_sale_price_date);

                                        $date_remain = $earlier->diff($later)->format("%r%a"); //3
                                    @endphp

                                    @if( $date_remain > 0 )
                                        <strike style="color: black">&dollar;{{ $products->product->regular_price }} </strike>
                                        /&dollar;{{ $products->product->sale_price }}
                                    @else
                                        <span style="color: black">&dollar;{{ $products->product->regular_price }} </span>
                                    @endif
                                </div>
                                <form action="{{ route('cart.add') }}"
                                      id="cartForm-{{ $products->product->id }}-{{ $category->id }}"
                                      method="get">

                                    <div class="row g-2 mt-2">
                                        <div class="col-md-3 mt-2">
                                            <input type="text" name="product_id" id=""
                                                   value="{{ $products->product->id }}" hidden/>
                                            <input type="text" name="category_id" id=""
                                                   value="{{ $category->id }}" hidden/>
                                            <input class="form-control neumo-input p-1" type="number"
                                                   name="product_qty" id="" value="1" placeholder="1"
                                                   style="font-size: 12px"/>
                                        </div>
                                        <div class="col-md-9 mt-2">
                                            <button type="submit"
                                                    class="btn btn-sm neumo-foods-cart-btn w-100 fw-bolder"
                                                    style="font-size: 15px;">
                                                <i class="bi bi-cart4 me-1"></i>
                                                ADD TO CARD
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div><!-- Menu Item -->

                        <script>
                            {{--$(document).ready(function() {--}}
                            {{--    $("#cartForm-{{ $products->product->id }}-{{ $category->id }}").submit(function(event) {--}}
                            {{--        // Stop the form from submitting normally--}}
                            {{--        event.preventDefault();--}}

                            {{--        // Serialize the form data--}}
                            {{--        let formData = $("#cartForm-{{ $products->product->id }}-{{ $category->id }}").serialize();--}}

                            {{--        // Submit the form data using AJAX--}}
                            {{--        $.ajax({--}}
                            {{--            type: 'GET',--}}
                            {{--            url: '/cart/add',--}}
                            {{--            data: formData,--}}
                            {{--            success: function(response) {--}}

                            {{--                    alert(response);--}}

                            {{--            },--}}
                            {{--            error: function(xhr, status, error) {--}}
                            {{--                alert('Error submitting form: ' + error);--}}
                            {{--            }--}}
                            {{--        });--}}
                            {{--    });--}}
                            {{--});--}}
                        </script>
                    @endforeach
                </div>
            </div><!-- End {{ $category->name }} Menu Content -->
        @endif

    @endforeach

</div>
