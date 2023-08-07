@extends('rioAdmin.master')

@section('title')
    Product-List
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
        <li class="with-submenu showMenu"> <!-- When active This link, then here is added a class (showMenu) -->
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bxl-product-hunt'></i>
                    <span class="link_name">Product</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu" data-aos="fade-down">
                <li class="ln"><span class="link_name">Product</span></li>
                <li class="active-item d-flex justify-content-start p-0">
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
                <li><a href="#">HTML & CSS</a></li> <!-- When active This link, then here is added a class (active) -->
                <li><a href="#">JavaScript</a></li>
                <li><a href="#">PHP & MySQL</a></li>
            </ul>
        </li>
    </ul>

@endsection

@section('main-content')

    <div class="pagetitle neumo-primary p-3 d-flex justify-content-between" data-aos="fade-down">
        <h1 class="lh-base">Product</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('product.list') }}">Product</a></li>
                <li class="breadcrumb-item active">List</li>
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
                            <th>Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Visibility</th>
                            <th>Sale Price</th>
                            <th>Regular Price</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>
                            <td>
                                <div>
                                    @if($product->image)
                                        <img class="img-thumbnail" src="{{ asset( $product->image ) }}"
                                             alt="" style="width: 50px; height: 50px;"/>
                                    @else
                                        <img class="img-thumbnail"
                                             src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png"
                                             alt="" style="width: 50px; height: 50px;"/>
                                    @endif
                                </div>
                            </td>
                            <td>
                                @if( $product->status == 0 )
                                    <span class="badge  bg-success">Published</span>
                                @elseif( $product->status == 1 )
                                    <span class="badge  bg-secondary">Pending Review</span>
                                @else
                                    <span class="badge  bg-warning">Draft</span>
                                @endif
                            </td>
                            <td>
                                @if( $product->visibility == 0 )
                                    <span class="badge  bg-primary">Public</span>
                                @elseif( $product->visibility == 1 )
                                    <span class="badge  bg-secondary">Private</span>
                                @else
                                    <span class="badge  bg-dark">Only for users</span>
                                @endif
                            </td>
                            <td>{{ $product->regular_price }}</td>
                            <td>{{ $product->sale_price }}</td>
                            <td>
                                <ul class="list-unstyled hstack gap-1 mb-0">
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                        <button class="btn btn-sm text-dark" data-bs-toggle="modal"
                                                data-bs-target=".product-detailModal-{{ $product->id }}"><i
                                                class="bi bi-eye"></i></button>
                                    </li>
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                        <a href="{{ route('product.update', ['id' => $product->id]) }}" class="btn btn-sm text-info"><i
                                                class="bi bi-pencil-square"></i></a>
                                    </li>
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                        <a href="{{ route('product.delete', ['id' => $product->id]) }}" class="btn btn-sm text-danger"><i
                                                class="bi bi-trash"></i></a>
                                    </li>
                                </ul>

                                <!-- Product Details Modal -->
                                <div class="modal fade product-detailModal-{{ $product->id }}" tabindex="-1"
                                     role="dialog" aria-labelledby="Category-detailModalLabel-{{ $product->id }}"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document" style="">
                                        <div class="modal-content rounded-0">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="Category-detailModalLabel-{{ $product->id }}">Product
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
                                                                            @if($product->image)
                                                                                <img
                                                                                    src="{{ asset( $product->image ) }}"
                                                                                    alt="" class="img-thumbnail rounded-0 border-0 h-100 w-100"/>
                                                                            @else
                                                                                <img
                                                                                    src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png"
                                                                                    alt="" class="img-thumbnail h-100 w-100"/>
                                                                            @endif
                                                                        </div>
                                                                        <div class="card-footer text-uppercase fw-bold">{{ $product->name }}</div>
                                                                    </div>
                                                                    <div class="card bg-light p-0 m-0 neumo-primary">
                                                                        <div class="card-body p-2">
                                                                            <table class="table table-bordered text-capitalize table-hover dt-responsive nowrap w-100">
                                                                                <tbody>
                                                                                <tr>
                                                                                    <th>Name</th>
                                                                                    <th> :</th>
                                                                                    <td>{{ $product->name }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Product Code</th>
                                                                                    <th> :</th>
                                                                                    <td>{{ $product->id }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Published</th>
                                                                                    <th> :</th>
                                                                                    <td>
                                                                                        {{ $product->published_date }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Tags</th>
                                                                                    <th> :</th>
                                                                                    <td>
                                                                                        N/A
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Categories</th>
                                                                                    <th> :</th>
                                                                                    <td>
                                                                                        @foreach($product->productCategory as $productCategory)
                                                                                            {{ $productCategory->category->name }} ,  <br/>
                                                                                        @endforeach
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Total Sale</th>
                                                                                    <th> :</th>
                                                                                    <td>
                                                                                        @php
                                                                                            $productQty = 0;
                                                                                        @endphp

                                                                                        @foreach($product->orderedProduct as $orderedProduct)
                                                                                            @php
                                                                                                $productQty += $orderedProduct->product_qty;
                                                                                            @endphp
                                                                                        @endforeach

                                                                                        {{ $productQty }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Edit</th>
                                                                                    <th> :</th>
                                                                                    <td>
                                                                                        <ul class="list-unstyled hstack gap-1 mb-0">
                                                                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                                                                <a href="{{ route('product.update', ['id' => $product->id]) }}" class="btn btn-sm text-info"><i
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
                                                                                                <a href="{{ route('product.delete', ['id' => $product->id]) }}" class="btn btn-sm text-danger">
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
                                                                                    <td>{{ $product->id }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Description</th>
                                                                                    <th> :</th>
                                                                                    <td>{!! $product->description !!}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Status</th>
                                                                                    <th> :</th>
                                                                                    <td>
                                                                                        @if( $product->status == 0 )
                                                                                            <span class="badge  bg-success">Published</span>
                                                                                        @elseif( $product->status == 1 )
                                                                                            <span class="badge  bg-secondary">Pending Review</span>
                                                                                        @else
                                                                                            <span class="badge  bg-warning">Draft</span>
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Visibility</th>
                                                                                    <th> :</th>
                                                                                    <td>
                                                                                        @if( $product->visibility == 0 )
                                                                                            <span class="badge  bg-primary">Public</span>
                                                                                        @elseif( $product->visibility == 1 )
                                                                                            <span class="badge  bg-secondary">Private</span>
                                                                                        @else
                                                                                            <span class="badge  bg-dark">Only for users</span>
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Stock</th>
                                                                                    <th> :</th>
                                                                                    <td>
                                                                                        @if( $product->stock_status == 0 )
                                                                                            <span class="badge  bg-primary">In stock</span>
                                                                                        @elseif( $product->stock_status == 1 )
                                                                                            <span class="badge  bg-secondary">Out of stock</span>
                                                                                        @else
                                                                                            <span class="badge  bg-dark">On backorder</span>
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Condition</th>
                                                                                    <th> :</th>
                                                                                    <td>
                                                                                        @if( $product->condition == 0 )
                                                                                            <span class="badge  bg-primary">New</span>
                                                                                        @elseif( $product->condition == 1 )
                                                                                            <span class="badge  bg-secondary">Refurbished</span>
                                                                                        @else
                                                                                            <span class="badge  bg-dark">Used</span>
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Weight</th>
                                                                                    <th> :</th>
                                                                                    <td>
                                                                                        {{ $product->weight }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Height</th>
                                                                                    <th> :</th>
                                                                                    <td>
                                                                                        {{ $product->height }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Length</th>
                                                                                    <th> :</th>
                                                                                    <td>
                                                                                        {{ $product->length }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Width</th>
                                                                                    <th> :</th>
                                                                                    <td>
                                                                                        {{ $product->width }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Regular Price</th>
                                                                                    <th> :</th>
                                                                                    <td>
                                                                                        {{ $product->regular_price }}&dollar;
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Sale Price</th>
                                                                                    <th> :</th>
                                                                                    <td>
                                                                                        {{ $product->sale_price }}&dollar;
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Sale Price Date Remain</th>
                                                                                    <th> :</th>
                                                                                    <td>
                                                                                        @php
                                                                                            $earlier = new DateTime($product->start_sale_price_date);
                                                                                            $later = new DateTime($product->end_sale_price_date);

                                                                                            $date_remain = $earlier->diff($later)->format("%r%a"); //3
                                                                                            // $neg_diff = $later->diff($earlier)->format("%r%a"); //-3

                                                                                        @endphp

                                                                                        @if( $date_remain > 0 )
                                                                                            {{ $date_remain }} Dayes
                                                                                        @else
                                                                                            {{ 0 }} dayes
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Gallery</th>
                                                                                    <th> :</th>
                                                                                    <td>
                                                                                        N/A
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
                            <th>Visibility</th>
                            <th>Sale Price</th>
                            <th>Regular Price</th>
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
