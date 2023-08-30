@extends('rioHome.master')

@section('title')
    Home
@endsection

@section('nav-links')
    <ul>
        <li><a href="{{ route('home') }}" class="active">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="{{ route('our-foods') }}">Menu</a></li>
{{--        <li><a href="#chefs">Chefs</a></li>--}}
{{--        <li><a href="#gallery">Gallery</a></li>--}}
        <li><a href="#contact">Contact</a></li>
    </ul>
@endsection

@section('main-content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center ">
        <div class="container neumorphism pb-2">
            <div class="row neumorphism p-5">
                <div class="col-md-12">
                    <h1>
                        @if(empty($app_settings->type_write_text))
                            <a href="" class="typewrite" data-period="2000"
                               data-type='[ "No Text Here" ]'>
                                <span class="wrap"></span>
                            </a>
                        @else
                            <a href="" class="typewrite" data-period="2000"
                               data-type='[ "{{ $app_settings->type_write_text }}" ]'>
                                <span class="wrap"></span>
                            </a>
                        @endif
                    </h1>
                </div>
            </div>
            <div class="row justify-content-between gy-2  p-5">
                <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
                    @if(empty($app_settings->home_heading))
                        <h2 data-aos="fade-up">No Heading Here</h2>
                    @else
                        <h2 data-aos="fade-up">{!! $app_settings->home_heading !!}</h2>
                    @endif

                    @if(empty($app_settings->home_para))
                        <p data-aos="fade-up" data-aos-delay="100">
                            No Para Here
                        </p>
                    @else
                        <p data-aos="fade-up" data-aos-delay="100">
                            {{ $app_settings->home_para }}
                        </p>
                    @endif

                    <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
{{--                        <a href="#book-a-table" class="btn-book-a-table">Book a Table</a>--}}
                        @if(empty($app_settings->food_video))
                            <a href="#"
                               class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
                        @else
                            <a href="{{ $app_settings->food_video }}"
                               class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
                        @endif

                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start numorphism rounded-circle">
                    <img src="{{ asset('/') }}rioHome/assets/image/hero-img.png" class="img-fluid" alt=""
                         data-aos="ease-in" data-aos-delay="300">
                </div>
            </div>
        </div>
    </section><!-- End Hero Section -->
@endsection

@section('script')
    <script type="text/javascript">
        var TxtType = function (el, toRotate, period) {
            this.toRotate = toRotate;
            this.el = el;
            this.loopNum = 0;
            this.period = parseInt(period, 10) || 2000;
            this.txt = '';
            this.tick();
            this.isDeleting = false;
        };

        TxtType.prototype.tick = function () {
            var i = this.loopNum % this.toRotate.length;
            var fullTxt = this.toRotate[i];

            if (this.isDeleting) {
                this.txt = fullTxt.substring(0, this.txt.length - 1);
            } else {
                this.txt = fullTxt.substring(0, this.txt.length + 1);
            }

            this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

            var that = this;
            var delta = 200 - Math.random() * 100;

            if (this.isDeleting) {
                delta /= 2;
            }

            if (!this.isDeleting && this.txt === fullTxt) {
                delta = this.period;
                this.isDeleting = true;
            } else if (this.isDeleting && this.txt === '') {
                this.isDeleting = false;
                this.loopNum++;
                delta = 500;
            }

            setTimeout(function () {
                that.tick();
            }, delta);
        };

        window.onload = function () {
            var elements = document.getElementsByClassName('typewrite');
            for (var i = 0; i < elements.length; i++) {
                var toRotate = elements[i].getAttribute('data-type');
                var period = elements[i].getAttribute('data-period');
                if (toRotate) {
                    new TxtType(elements[i], JSON.parse(toRotate), period);
                }
            }
            // INJECT CSS
            var css = document.createElement("style");
            css.type = "text/css";
            css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
            document.body.appendChild(css);
        };

    </script>
@endsection
