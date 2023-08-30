@extends('rioAdmin.master')

@section('title')
    Customer || List
@endsection

@section('sidebar-links')

    <ul class="nav-links h-100 py-3 px-2">
        <li class="mb-2 with-out-submenu">
            <a href="{{ route('admin.dashboard') }}">
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
        <li class="with-submenu showMenu"> <!-- When active This link, then here is added a class (showMenu) -->
            <div class="iocn-link">
                <a href="#">
                    <i class="bi bi-person-badge"></i>
                    <span class="link_name">Customer</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li class="ln"><span class="link_name">Customer</span></li>
                <li class="active-item d-flex justify-content-start p-0">
                    <i class='bx bx-list-plus'></i>
                    <a href="{{ route('customer.list') }}">Customer</a>
                </li> <!-- When active This link, then here is added a class (active-item) -->
            </ul>
        </li>
        <li class="with-submenu"> <!-- When active This link, then here is added a class (showMenu) -->
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bxs-coupon'></i>
                    <span class="link_name">Cuupon</span>
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
        <h1 class="lh-base">Customer</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Customer</a></li>
                <li class="breadcrumb-item active">Customer</li>
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
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $customer->id }}</td>
                                <td>
                                    <div>
                                        @if($customer->image)
                                            <img class="img-thumbnail" src="{{ asset( $customer->image ) }}"
                                                 alt="" style="width: 50px; height: 50px;"/>
                                        @else
                                            <img class="img-thumbnail"
                                                 src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png"
                                                 alt="" style="width: 50px; height: 50px;"/>
                                        @endif
                                    </div>
                                </td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>
                                    <ul class="list-unstyled hstack gap-1 mb-0">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <button class="btn btn-sm text-dark" data-bs-toggle="modal"
                                                    data-bs-target=".customer-detailModal-{{ $customer->id }}"><i
                                                    class="bi bi-eye"></i></button>
                                        </li>
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                            <a href="{{ route('customer.update', ['id' => $customer->id]) }}" class="btn btn-sm text-info"><i
                                                    class="bi bi-pencil-square"></i></a>
                                        </li>
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                            <a href="{{ route('customer.delete', ['id' => $customer->id]) }}" class="btn btn-sm text-danger"><i
                                                    class="bi bi-trash"></i></a>
                                        </li>
                                    </ul>

                                    <!-- Product Details Modal -->
                                    <div class="modal fade customer-detailModal-{{ $customer->id }}" tabindex="-1"
                                         role="dialog" aria-labelledby="customer-detailModalLabel-{{ $customer->id }}"
                                         aria-hidden="true">
                                        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document" style="">
                                            <div class="modal-content rounded-0">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="customer-detailModalLabel-{{ $customer->id }}">Product
                                                        Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="card p-2 m-0" style="box-shadow: none;">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="card bg-light p-0 mb-4 neumo-primary">
                                                                            <div class="card-body m-0 p-0">
                                                                                @if($customer->image)
                                                                                    <img
                                                                                        src="{{ asset( $customer->image ) }}"
                                                                                        alt="" class="img-thumbnail rounded-0 border-0 h-100 w-100"/>
                                                                                @else
                                                                                    <img
                                                                                        src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png"
                                                                                        alt="" class="img-thumbnail h-100 w-100"/>
                                                                                @endif
                                                                            </div>
                                                                            <div class="card-footer text-uppercase fw-bold">{{ $customer->name }}</div>
                                                                        </div>
                                                                        <div class="card bg-light p-0 m-0 neumo-primary">
                                                                            <div class="card-body p-2">
                                                                                <table class="table table-bordered text-capitalize table-hover dt-responsive nowrap w-100">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <th>Name</th>
                                                                                        <th> :</th>
                                                                                        <td>{{ $customer->name }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Customer ID</th>
                                                                                        <th> :</th>
                                                                                        <td>{{ $customer->id }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Total Buy</th>
                                                                                        <th> :</th>
                                                                                        <td>
                                                                                            N/A
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Total Order</th>
                                                                                        <th> :</th>
                                                                                        <td>
                                                                                            N/A
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Edit</th>
                                                                                        <th> :</th>
                                                                                        <td>
                                                                                            <ul class="list-unstyled hstack gap-1 mb-0">
                                                                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                                                                    <a href="{{ route('customer.update', ['id' => $customer->id]) }}" class="btn btn-sm text-info"><i
                                                                                                            class="bi bi-pencil-square"></i>
                                                                                                    </a>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Delete</th>
                                                                                        <th> :</th>
                                                                                        <td>
                                                                                            <ul class="list-unstyled hstack gap-1 mb-0">
                                                                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                                                                    <a href="{{ route('customer.delete', ['id' => $customer->id]) }}" class="btn btn-sm text-danger">
                                                                                                        <i class="bi bi-trash-fill"></i>
                                                                                                    </a>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="card bg-light p-0 m-0 neumo-primary">
                                                                            <div class="card-header text-center text-capitalize">Specification</div>
                                                                            <div class="card-body p-2">
                                                                                <table class="table table-bordered text-capitalize table-hover dt-responsive nowrap w-100">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <th>ID</th>
                                                                                        <th> :</th>
                                                                                        <td>{{ $customer->id }}</td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end modal -->
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>SL/NO</th>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
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
