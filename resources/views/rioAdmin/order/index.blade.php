@extends('rioAdmin.master')

@section('title')
    Order || List
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
        <h1 class="lh-base">New Order</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">New Order</a></li>
                <li class="breadcrumb-item active">Order</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card card-body neumo-primary p-2">
                    <table id="example" class="table table-hover table-striped text-primary-size" style="width:100%">
                        <thead>
                        <tr>
                            <th>SL/NO</th>
                            <th>Order No</th>
                            <th>TxId</th>
                            <th>Shipping Email</th>
                            <th>Shipping Phone</th>
                            <th>Pay Method</th>
                            <th>Shipping Method</th>
                            <th>Payment Status</th>
                            <th>Order Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach( $order as $item )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->transaction_id }}</td>
                                <td>{{ $item->ship_email }}</td>
                                <td>{{ $item->ship_phone }}</td>
                                <td>

                                    @if( $item->pay_method == 0 )
                                        <span class="badge text-bg-primary">Bkash</span>
                                    @elseif( $item->pay_method == 1 )
                                        <span class="badge text-bg-primary">Rocket</span>
                                    @elseif( $item->pay_method == 2 )
                                        <span class="badge text-bg-primary">Nagad</span>
                                    @else
                                        <span class="badge text-bg-dark">Cash On</span>
                                    @endif

                                </td>
                                <td>{!!   $item->ship_method == 0 ? '<span class="badge text-bg-success">Home Delivery</span>': '<span class="badge text-bg-dark">Shop Delivery</span>' !!}</td>
                                <td>
                                    @if( $item->status == 'Pending' )
                                        <span class="badge text-bg-light">Pending</span>
                                    @elseif( $item->status == 'Processing' )
                                        <span class="badge text-bg-primary">Processing</span>
                                    @elseif( $item->status == 'Completed' )
                                        <span class="badge text-bg-success">Completed</span>
                                    @else
                                        <span class="badge text-bg-danger">Fail/Refunded</span>
                                    @endif
                                </td>
                                <td>

                                    @if( $item->order_status == 0 )
                                        <span class="badge text-bg-light">Received</span>
                                    @elseif( $item->order_status == 1 )
                                        <span class="badge text-bg-primary">Processing</span>
                                    @elseif( $item->order_status == 2 )
                                        <span class="badge text-bg-success">Completed</span>
                                    @else
                                        <span class="badge text-bg-danger">Canceled</span>
                                    @endif

                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-secondary btn-sm" type="button">
                                            Action
                                        </button>
                                        <button type="button"
                                                class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="visually-hidden">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                   href="{{ route('order.update', ['id' => $item->id]) }}">Update</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="{{ route('order.delete', ['id' => $item->id]) }}">Delete</a>
                                            </li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>SL/NO</th>
                            <th>Order No</th>
                            <th>TxId</th>
                            <th>Shipping Email</th>
                            <th>Shipping Phone</th>
                            <th>Pay Method</th>
                            <th>Shipping Method</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('app-scripts')
    <script type="text/javascript">

        $(document).ready(function () {
            let table = $('#example').DataTable({

                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']

            });

            table.buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
        });

    </script>
@endsection
