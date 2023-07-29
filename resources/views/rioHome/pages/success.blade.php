@extends('rioHome.master')

@section('title')
    SUCCESS
@endsection

@section('style')
    <style>
        /*--thank you pop starts here--*/
        .thank-you-pop {
            width: 100%;
            padding: 20px;
            text-align: center;
        }

        .thank-you-pop img {
            width: 76px;
            height: auto;
            margin: 0 auto;
            display: block;
            margin-bottom: 25px;
        }

        .thank-you-pop h1 {
            font-size: 42px;
            margin-bottom: 25px;
            color: #5C5C5C;
        }

        .thank-you-pop p {
            font-size: 20px;
            margin-bottom: 27px;
            color: #5C5C5C;
        }

        .thank-you-pop h3.cupon-pop {
            font-size: 25px;
            margin-bottom: 40px;
            color: #222;
            display: inline-block;
            text-align: center;
            padding: 10px 20px;
            border: 2px dashed #222;
            clear: both;
            font-weight: normal;
        }

        .thank-you-pop h3.cupon-pop span {
            color: #03A9F4;
        }

        .thank-you-pop a {
            display: inline-block;
            margin: 0 auto;
            padding: 9px 20px;
            color: #fff;
            text-transform: uppercase;
            font-size: 14px;
            background-color: #8BC34A;
            border-radius: 17px;
        }

        .thank-you-pop a i {
            margin-right: 5px;
            color: #fff;
        }

        #ignismyModal .modal-header {
            border: 0px;
        }

        /*--thank you pop ends here--*/

    </style>
@endsection

@section('nav-links')
    <ul>
        <li><a href="{{ route('home') }}" class="active">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="{{ route('our-foods') }}">Menu</a></li>
        <li><a href="#chefs">Chefs</a></li>
        <li><a href="#gallery">Gallery</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>
@endsection

@section('main-content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center ">
        <div class="container">

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                 aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="thank-you-pop">

                                <img src="http://goactionstations.co.uk/wp-content/uploads/2017/03/Green-Round-Tick.png"
                                     alt="">
                                <h1>Thank You!</h1>
                                <p>Your order is received and we will contact you soon</p>
                                <h3 class="cupon-pop">Order Id: <span>{{ $order_id }}</span></h3>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Hero Section -->
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $("#staticBackdrop").modal('show');
        });

        const myModalEl = document.getElementById('staticBackdrop')
        myModalEl.addEventListener('hidden.bs.modal', event => {
            window.location.href = "{{ route('dashboard')}}";
        })
    </script>
@endsection
