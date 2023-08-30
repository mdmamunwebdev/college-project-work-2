@extends('rioAdmin.master')

@section('title')
    Home
@endsection

@section('sidebar-links')

    <ul class="nav-links h-100 py-3 px-2">
        <li class="mb-2 with-out-submenu active-item">
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
                    <i class="bi bi-gear"></i>
                    <span class="link_name">Settings</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li class="ln"><span class="link_name">Settings</span></li>
                <li class="d-flex justify-content-start p-0">
                    <i class='bx bx-list-plus'></i>
                    <a href="{{ route('app.settings') }}">Settings</a>
                </li> <!-- When active This link, then here is added a class (active-item) -->
            </ul>
        </li>
    </ul>

@endsection

@section('main-content')

    <div class="pagetitle neumo-primary p-3 d-flex justify-content-between">
        <h1 class="lh-base">Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">

        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card neumo-primary">
                            <div class="card-body">
                                <h5 class="card-title">Sales</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i></div>
                                    <div class="ps-3">
                                        <h6>{{ $sales }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Sales -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card neumo-primary">
                            <div class="card-body">
                                <h5 class="card-title">Revenue</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i></div>
                                    <div class="ps-3">
                                        <h6>${{ $revenue }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Revenue -->
                    <div class="col-xxl-4 col-xl-12">
                        <div class="card info-card customers-card neumo-primary">
                            <div class="card-body">
                                <h5 class="card-title">Customers</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i></div>
                                    <div class="ps-3">
                                        <h6>{{ count($customers) }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Customers -->
                    <div class="col-12">
                        <div class="card neumo-primary">
                            <div class="card-body">
                                <h5 class="card-title">Reports <span>| Last 7 Times</span></h5>
                                <div id="reportsChart"></div>
                                <script>document.addEventListener("DOMContentLoaded", () => {
                                        new ApexCharts(document.querySelector("#reportsChart"), {
                                            series: [{
                                                name: 'Sales',
                                                data: [31, 40, 28, 51, 42, 82, 56],
                                            }, {
                                                name: 'Revenue',
                                                data: [11, 32, 45, 32, 34, 52, 41]
                                            }, {
                                                name: 'Customers',
                                                data: [15, 11, 32, 18, 9, 24, 11]
                                            }],
                                            chart: {
                                                height: 350,
                                                type: 'area',
                                                toolbar: {
                                                    show: false
                                                },
                                            },
                                            markers: {
                                                size: 4
                                            },
                                            colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                            fill: {
                                                type: "gradient",
                                                gradient: {
                                                    shadeIntensity: 1,
                                                    opacityFrom: 0.3,
                                                    opacityTo: 0.4,
                                                    stops: [0, 90, 100]
                                                }
                                            },
                                            dataLabels: {
                                                enabled: false
                                            },
                                            stroke: {
                                                curve: 'smooth',
                                                width: 2
                                            },
                                            xaxis: {
                                                type: 'datetime',
                                                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                                            },
                                            tooltip: {
                                                x: {
                                                    format: 'dd/MM/yy HH:mm'
                                                },
                                            }
                                        }).render();
                                    });
                                </script>
                            </div>
                        </div>
                    </div> <!-- Reports -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto neumo-primary">
                            <div class="card-body">
                                <h5 class="card-title">Recent Sales</h5>
                                <table class="table table-borderless datatable">
                                    <thead>
                                    <tr class="neumo-primary">
                                        <th scope="col">#</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($recent_sales as $recent_sale)
                                            <tr>
                                                <th scope="row"><a href="#">#{{ $recent_sale->product->id }}</a></th>
                                                <td>{{ $recent_sale->order->cus_userName }}</td>
                                                <td><a href="#" class="text-primary">{{ $recent_sale->product->name }}</a></td>
                                                <td>${{ $recent_sale->sale_price }}</td>
                                                <td><span class="badge {{ $recent_sale->order_status == 0 ? 'bg-info':'bg-success' }}">{{ $recent_sale->order_status == 0 ? 'Received':'Completed' }}</span></td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- Recent Sales -->
                    </div> <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card top-selling overflow-auto neumo-primary">
                            <div class="card-body pb-0">
                                <h5 class="card-title">Top Selling</h5>
                                <table class="table table-borderless text-capitalize">
                                    <thead>
                                    <tr class="neumo-primary">
                                        <th scope="col">Preview</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Sold</th>
                                        <th scope="col">Revenue</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($top_sale as $item)
                                            <tr>
                                                <th scope="row"><a href="#"><img src="{{ asset($item['product_image']) }}" alt=""></a></th>
                                                <td>{{ $item['name'] }}</td>
                                                <td>&dollar;{{ $item['price'] }}</td>
                                                <td class="fw-bold">{{ $item['product_qty'] }}</td>
                                                <td>&dollar;{{ number_format($item['product_revenue']) }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- Top Selling -->
                    </div> <!-- Top Selling -->
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card neumo-primary">
                    <div class="card-body">
                        <h5 class="card-title">Recent Activity</h5>
                        <div class="activity">

                            @foreach($recent_activities as $recent_activity)
                                <div class="activity-item d-flex">
                                    @php

                                       $postPublishedTimestamp = $recent_activity->created_at; // Replace with your actual timestamp

                                       $currentDateTime = new DateTime();
                                       $postPublishedDateTime = new DateTime($postPublishedTimestamp);

                                       $diff = $currentDateTime->diff($postPublishedDateTime);

                                       $days = $diff->days;
                                       $hours = $diff->h;
                                       $minutes = $diff->i;
                                       $seconds = $diff->s;

                                    @endphp

                                    <div class="activite-label">{{ $days }} days {{ $hours }} hrs {{ $minutes }} min {{ $seconds }} sec</div>
                                    <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                    <div class="activity-content"> {{ $recent_activity->transaction_id }}
                                        <a href="#" class="fw-bold text-dark">
                                            {{ $recent_activity->cus_userName }}
                                        </a>
                                        {{ $recent_activity->email }}
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div> <!-- Recent Activity -->
                <div class="card neumo-primary">
                    <div class="card-body pb-0">
                        <h5 class="card-title">Order Reports</h5>
                        <div id="orderReportsChart" style="min-height: 400px;" class="echart"></div>
                        <script>document.addEventListener("DOMContentLoaded", () => {
                                echarts.init(document.querySelector("#orderReportsChart")).setOption({
                                    tooltip: {
                                        trigger: 'item'
                                    },
                                    legend: {
                                        top: '5%',
                                        left: 'center'
                                    },
                                    series: [{
                                        name: 'Access From',
                                        type: 'pie',
                                        radius: ['40%', '70%'],
                                        avoidLabelOverlap: false,
                                        label: {
                                            show: false,
                                            position: 'center'
                                        },
                                        emphasis: {
                                            label: {
                                                show: true,
                                                fontSize: '18',
                                                fontWeight: 'bold'
                                            }
                                        },
                                        labelLine: {
                                            show: false
                                        },
                                        data: [
                                            {
                                                value: {{ $order_canceled }},
                                                name: 'Order Cancel'
                                            },
                                            {
                                                value: {{ $order_completed }},
                                                name: 'Order Complete'
                                            }
                                        ]
                                    }]
                                });
                            });
                        </script>
                    </div>
                </div> <!-- Order Reports -->
            </div>
        </div>
    </section>

@endsection
