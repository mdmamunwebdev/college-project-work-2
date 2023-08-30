@extends('rioAdmin.master')

@section('title')
    Product- Coupon Update-
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
        <li class="with-submenu "> <!-- When active This link, then here is added a class (showMenu) -->
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bxl-product-hunt'></i>
                    <span class="link_name">Product</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu" data-aos="fade-down">
                <li class="ln"><span class="link_name">Product</span></li>
                <li class="d-flex justify-content-start p-0">
                    <i class='bx bx-list-plus'></i>
                    <a href="{{ route('product.list') }}">Product List</a>
                </li> <!-- When active This link, then here is added a class (active-item) -->
                <li class="d-flex justify-content-start">
                    <i class='bx bx-add-to-queue'></i>
                    <a href="{{ route('product.create') }}">Add Product</a>
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
            <ul class="sub-menu" data-aos="fade-down">
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
                    <i class='bx bxs-coupon'></i>
                    <span class="link_name">Coupon</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu" data-aos="fade-down">
                <li class="ln"><span class="link_name">Coupon</span></li>
                <li class="active-item d-flex justify-content-start p-0">
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
    <div class="pagetitle neumo-primary p-3 d-flex justify-content-between" data-aos="fade-down">
        <h1 class="lh-base">Coupon Update</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Coupon</a></li>
                <li class="breadcrumb-item active">Coupon-Update</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row g-3">
            <div class="col-md-4">
                <form action="{{ route('coupon.update', ['id' => $coupon->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card card-body neumo-primary mb-2 p-0 ">
                        <input type="text" class="form-control" name="name" value="{{ $coupon->name }}" placeholder="Title : New Coupon"/>
                    </div>
                    <div class="card card-body neumo-primary mb-2 p-0">
                        <textarea name="description" class="form-control" id="summernote" cols="30"
                                  rows="10">{!! $coupon->name !!}</textarea>
                    </div>
                    <div class="row g-2 mt-2">
                        <div class="col-md-6">
                            <div class="card card-body neumo-primary mb-2 p-0 ">
                                <input type="text" class="form-control" value="{{ $coupon->code }}" name="code" placeholder="Code: Ex, #*555fffr/*"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-body neumo-primary mb-2 p-0 ">
                                <input type="text" class="form-control" value="{{ $coupon->price }}" name="price" placeholder="Discount Price"/>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md-6">
                            <div class="card card-body neumo-primary mb-2 p-0 border-neumo">
                                <select name="calculation" id="" class="form-select bg-neumo text-primary-size">
                                    <option value="1" {{ $coupon->calculation == 1 ? 'selected':'' }} class="bg-neumo">Percentage</option>
                                    <option value="0" {{ $coupon->calculation == 0 ? 'selected':'' }} class="bg-neumo">Addition</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-body neumo-primary mb-2 p-0 border-neumo">
                                <select name="status" id="" class="form-select bg-neumo text-primary-size">
                                    <option value="1" {{ $coupon->status == 1 ? 'selected':'' }} class="bg-neumo">Active</option>
                                    <option value="0" {{ $coupon->status == 0 ? 'selected':'' }} class="bg-neumo">Deactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card card-body neumo-primary mb-2 mt-3 p-0 border-secondary-neumo">
                        <button type="submit" class="btn btn-sm rounded-0 w-100 p-1 text-secondary-neumo">Add Coupon</button>
                    </div>

                </form>
            </div>
            <div class="col-md-8">
                <div class="card card-body neumo-primary p-2">
                    <table id="example"
                           class="table table-hover table-striped text-capitalize text-primary-size text-neumo"
                           style="width:100%">
                        <thead>
                        <tr>
                            <th>SL/NO</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Status</th>
                            <th class="text-end">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($coupons as $coupon)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $coupon->name }}</td>
                                <td>{{ $coupon->code }}</td>
                                <td>
                                    <span class="badge  {{ $coupon->status == 1 ? 'bg-success':'bg-danger' }}">{{ $coupon->status == 1 ? 'Active':'Deactive' }}</span>
                                </td>
                                <td>
                                    <ul class="list-unstyled hstack gap-1 mb-0 justify-content-end">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                            <button class="btn btn-sm text-dark" data-bs-toggle="modal"
                                                    data-bs-target=".Category-detailModal-{{ $coupon->id }}"><i
                                                    class="bi bi-eye"></i></button>
                                        </li>
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Status">
                                            <a href="{{ route('coupon.status', ['id' => $coupon->id]) }}" class="btn btn-sm  {{ $coupon->status == 1 ? 'text-success' : 'text-warning' }}"><i
                                                    class="bi {{ $coupon->status == 1 ? 'bi-arrow-up-circle' : 'bi-arrow-down-circle' }}"></i>
                                            </a>
                                        </li>
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                            <a href="{{ route('coupon.update', ['id' => $coupon->id]) }}" class="btn btn-sm text-primary"><i
                                                    class="bi bi-pencil-square"></i></a>
                                        </li>
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                            <a href="{{ route('coupon.delete', ['id' => $coupon->id]) }}" class="btn btn-sm text-danger"><i
                                                    class="bi bi-trash"></i></a>
                                        </li>
                                    </ul>

                                    <!-- Coupon Details Modal -->
                                    <div class="modal fade Category-detailModal-{{ $coupon->id }}" tabindex="-1"
                                         role="dialog" aria-labelledby="Category-detailModalLabel-{{ $coupon->id }}"
                                         aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document"
                                             style="max-width: 900px">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="Category-detailModalLabel-{{ $coupon->id }}">Coupon
                                                        Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="card">
                                                                <div class="row g-2">
                                                                    <div class="col-md-12">
                                                                        <div class="card bg-light">
                                                                            <div class="card-header text-center text-capitalize">{{ $coupon->name }}</div>
                                                                            <div class="card-body">
                                                                                <table class="table table-bordered table-hover dt-responsive nowrap w-100">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <th>Coupon Id</th>
                                                                                        <th> :</th>
                                                                                        <td>{{ $coupon->id }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Coupon Code</th>
                                                                                        <th> :</th>
                                                                                        <td>{{ $coupon->code }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Coupon Discount Price</th>
                                                                                        <th> :</th>
                                                                                        <td>{{ $coupon->price }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Description</th>
                                                                                        <th> :</th>
                                                                                        <td>{!! $coupon->description !!}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Status</th>
                                                                                        <th> :</th>
                                                                                        <td>
                                                                                            <span class="badge  {{ $coupon->status == 1 ? 'bg-success':'bg-danger' }}">{{ $coupon->status == 1 ? 'Active':'Deactive' }}</span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Calculation</th>
                                                                                        <th> :</th>
                                                                                        <td>
                                                                                            <span class="badge  {{ $coupon->calculation == 1 ? 'bg-primary':'bg-secondary' }}">{{ $coupon->calculation == 1 ? 'Percentage':'Addition' }}</span>
                                                                                        </td>
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
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close
                                                    </button>
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
                            <th>Name</th>
                            <th>Code</th>
                            <th>Status</th>
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

        $('#summernote').summernote({
            placeholder: 'Write Here Your Category Descriptions',
            tabsize: 2,
            height: 311,
            toolbar: [
                ['style', ['style']],
                // ['font', ['bold', 'underline', 'clear']],
                ['font', ['bold', 'underline']],
                ['color', ['color']],
                // ['para', ['ul', 'ol', 'paragraph']],
                ['para', ['paragraph']],
                // ['table', ['table']],
                // ['insert', ['link', 'picture', 'video']],
                // ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
@endsection
