@extends('rioAdmin.master')

@section('title')
    Product- Category
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
        <li class="with-submenu showMenu"> <!-- When active This link, then here is added a class (showMenu) -->
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-collection'></i>
                    <span class="link_name">Category</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu" data-aos="fade-down">
                <li class="ln"><span class="link_name">Category</span></li>
                <li class="active-item d-flex justify-content-start p-0">
                    <i class='bx bx-list-plus'></i>
                    <a href="{{ route('category') }}">Category</a>
                </li> <!-- When active This link, then here is added a class (active-item) -->
            </ul>
        </li>
    </ul>

@endsection

@section('main-content')
    <div class="pagetitle neumo-primary p-3 d-flex justify-content-between" data-aos="fade-down">
        <h1 class="lh-base">Category</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Category</a></li>
                <li class="breadcrumb-item active">Category</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row g-3">
            <div class="col-md-4">
                <form action="{{ route('category.create') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card card-body neumo-primary mb-2 p-0 ">
                        <input type="text" class="form-control" name="name" placeholder="Title : New Category"/>
                    </div>
                    <div class="card card-body neumo-primary mb-2 p-0">
                        <textarea name="description" class="form-control" id="summernote" cols="30"
                                  rows="10"></textarea>
                    </div>
                    <div class="row g-2">
                        <div class="col-md-8">
                            <div class="card card-body neumo-primary mb-2 p-1 border-neumo text-primary-size">
                                <input type="file" name="image" id="" class="w-100"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-body neumo-primary mb-2 p-0 border-neumo">
                                <select name="status" id="" class="form-select bg-neumo text-primary-size">
                                    <option value="1" selected class="bg-neumo">Active</option>
                                    <option value="0" class="bg-neumo">Deactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card card-body neumo-primary mb-2 mt-3 p-0 border-secondary-neumo">
                        <button type="submit" class="btn btn-sm rounded-0 w-100 p-1 text-secondary-neumo">Add Category
                        </button>
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
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <div>
                                        @if($category->image)
                                            <img class="img-thumbnail h-25 w-25" src="{{ asset( $category->image ) }}"
                                                 alt=""/>
                                        @else
                                            <img class="img-thumbnail h-25 w-25"
                                                 src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png"
                                                 alt=""/>
                                        @endif
                                    </div>
                                </td>
                                <td><span
                                        class="badge  {{ $category->status == 1 ? 'bg-success':'bg-danger' }}">{{ $category->status == 1 ? 'Active':'Deactive' }}</span>
                                </td>
                                <td>
                                    <ul class="list-unstyled hstack gap-1 mb-0">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <button class="btn btn-sm btn-soft-primary" data-bs-toggle="modal"
                                                    data-bs-target=".category-detailModal-{{ $category->id }}"><i
                                                    class="bi bi-eye"></i></button>
                                        </li>
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Status">
                                            <a href="#" class="btn btn-sm btn-soft-secondary"><i
                                                    class="bi bi-arrow-up-circle"></i></a>
                                        </li>
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                            <a href="#" class="btn btn-sm btn-soft-info"><i
                                                    class="bi bi-pencil-square"></i></a>
                                        </li>
                                    </ul>

                                    <!-- Category Details Modal -->
                                    <div class="modal fade Category-detailModal-{{ $category->id }}" tabindex="-1"
                                         role="dialog" aria-labelledby="Category-detailModalLabel-{{ $category->id }}"
                                         aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document"
                                             style="max-width: 900px">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="Category-detailModalLabel-{{ $category->id }}">Category
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
                                                                            @if($category->image)
                                                                                <img
                                                                                    src="{{ asset( $category->image ) }}"
                                                                                    alt="" class="card-img-top"/>
                                                                            @else
                                                                                <img
                                                                                    src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png"
                                                                                    alt="" class="card-img-top"/>
                                                                            @endif
                                                                            <div
                                                                                class="card-header text-center text-capitalize">{{ $category->name }}</div>
                                                                            <div class="card-body">
                                                                                <table
                                                                                    class="table table-bordered table-hover dt-responsive nowrap w-100">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <th>Category Id</th>
                                                                                        <th> :</th>
                                                                                        <td>{{ $category->id }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Description</th>
                                                                                        <th> :</th>
                                                                                        <td>{{ $category->department }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Status</th>
                                                                                        <th> :</th>
                                                                                        <td>
                                                                                            <span
                                                                                                class="badge  {{ $category->status == 1 ? 'bg-success':'bg-danger' }}">{{ $category->status == 1 ? 'Active':'Deactive' }}</span>
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
                            <th>Image</th>
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
