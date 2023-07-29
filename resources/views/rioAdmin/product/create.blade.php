@extends('rioAdmin.master')

@section('title')
    Product
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
            <ul class="sub-menu">
                <li class="ln"><span class="link_name">Product</span></li>
                <li class="d-flex justify-content-start p-0">
                    <i class='bx bx-list-plus'></i>
                    <a href="{{ route('product.list') }}">Product List</a>
                </li> <!-- When active This link, then here is added a class (active-item) -->
                <li class="active-item d-flex justify-content-start p-0">
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
    </ul>

@endsection

@section('main-content')

    <div class="pagetitle neumo-primary p-3 d-flex justify-content-between">
        <h1 class="lh-base">Product</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('product.create') }}">Product</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <form action="{{ route('product.create') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-body neumo-primary p-0">
                                <input type="text" class="form-control" name="name" placeholder="Title : New Product"/>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card card-body neumo-primary p-0">
                                <textarea name="description" class="form-control " id="summernote" cols="30"
                                          rows="10"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card neumo-primary" style="font-size: 12px; height: 360px;">
                                <div class="card-header bg-neumo">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-database-fill-gear" viewBox="0 0 16 16">
                                        <path d="M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1Z"/>
                                        <path d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12.31 12.31 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7Zm6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.552 4.552 0 0 1 .23-2.002Zm-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.507 4.507 0 0 1-1.3-1.905Zm3.631-4.538c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                                    </svg>
                                    <span class="ms-2">Additional Data</span>
                                </div>
                                <div class="card-body p-3">
                                    <div class="d-flex align-items-start h-100">
                                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                             aria-orientation="vertical">
                                            <button class="nav-link active rounded-0" id="v-pills-general-tab"
                                                    data-bs-toggle="pill" data-bs-target="#v-pills-general"
                                                    type="button" role="tab" aria-controls="v-pills-general"
                                                    aria-selected="true">General
                                            </button>
                                            <button class="nav-link rounded-0" id="v-pills-inventory-tab"
                                                    data-bs-toggle="pill" data-bs-target="#v-pills-inventory"
                                                    type="button" role="tab" aria-controls="v-pills-inventory"
                                                    aria-selected="true">Inventory
                                            </button>
                                            <button class="nav-link rounded-0" id="v-pills-shipping-tab"
                                                    data-bs-toggle="pill" data-bs-target="#v-pills-shipping"
                                                    type="button" role="tab" aria-controls="v-pills-shipping"
                                                    aria-selected="false">Shipping
                                            </button>
                                            <button class="nav-link rounded-0" id="v-pills-advance-tab"
                                                    data-bs-toggle="pill" data-bs-target="#v-pills-advance"
                                                    type="button" role="tab" aria-controls="v-pills-advance"
                                                    aria-selected="false">Advance
                                            </button>
                                        </div>
                                        <div class="tab-content flex-grow-1 h-100" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active h-100" id="v-pills-general"
                                                 role="tabpanel" aria-labelledby="v-pills-general-tab" tabindex="0">
                                                <div class="card bg-neumo-pills m-0 h-100">
                                                    <div class="card-body  p-3">
                                                        <div class="row mb-3">
                                                            <label for="" class="col-4">Regular Price</label>
                                                            <div class="col-4">
                                                                <input type="number" name="regular_price" id=""
                                                                       class="form-control"/>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="" class="col-4">Sale Price</label>
                                                            <div class="col-4">
                                                                <input type="number" name="sale_price" id=""
                                                                       class="form-control"/>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="" class="col-4">Sale Price Date</label>
                                                            <div class="col-8">
                                                                <div class="row mb-3">
                                                                    <div class="col-12">
                                                                        <input type="date" name="start_sale_price_date"
                                                                               id="startSalePriceDate"
                                                                               class="form-control"
                                                                               placeholder="From… YYYY-MM-DD"/>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-12">
                                                                        <input type="date" name="end_sale_price_date"
                                                                               id="endSalePriceDate"
                                                                               class="form-control"
                                                                               placeholder="To… YYYY-MM-DD"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade h-100" id="v-pills-inventory" role="tabpanel"
                                                 aria-labelledby="v-pills-inventory-tab" tabindex="0">
                                                <div class="card bg-neumo-pills m-0 h-100">
                                                    <div class="card-body  p-3">
                                                        <div class="row mb-3">
                                                            <label for="" class="col-4">Stock Status</label>
                                                            <div class="col-6">
                                                                <div class="radio-container">
                                                                    <div class="radio-wrapper">
                                                                        <label class="radio-button">
                                                                            <input type="radio" name="stock_status"
                                                                                   value="0" id="option1" checked/>
                                                                            <span class="radio-checkmark"></span>
                                                                            <span class="radio-label">In stock</span>
                                                                        </label>
                                                                    </div>

                                                                    <div class="radio-wrapper">
                                                                        <label class="radio-button">
                                                                            <input type="radio" name="stock_status"
                                                                                   value="1" id="option2"/>
                                                                            <span class="radio-checkmark"></span>
                                                                            <span class="radio-label">Out of stock</span>
                                                                        </label>
                                                                    </div>

                                                                    <div class="radio-wrapper">
                                                                        <label class="radio-button">
                                                                            <input type="radio" name="stock_status"
                                                                                   value="2" id="option3"/>
                                                                            <span class="radio-checkmark"></span>
                                                                            <span class="radio-label">On backorder</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade h-100" id="v-pills-shipping" role="tabpanel"
                                                 aria-labelledby="v-pills-shipping-tab" tabindex="0">
                                                <div class="card bg-neumo-pills m-0 h-100">
                                                    <div class="card-body  p-3">
                                                        <div class="row mb-3">
                                                            <label for="" class="col-4">Weight(kg)</label>
                                                            <div class="col-6">
                                                                <input type="number" name="weight" id=""
                                                                       class="form-control" placeholder="0">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="" class="col-4">Dimensions(cm)</label>
                                                            <div class="col-8">
                                                                <div class="row g-2">
                                                                    <div class="col-4">
                                                                        <input type="number" name="length" id=""
                                                                               class="form-control"
                                                                               placeholder="Length"/>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <input type="number" name="width" id=""
                                                                               class="form-control"
                                                                               placeholder="Width"/>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <input type="number" name="height" id=""
                                                                               class="form-control"
                                                                               placeholder="Height"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade h-100" id="v-pills-advance" role="tabpanel"
                                                 aria-labelledby="v-pills-advance-tab" tabindex="0">
                                                <div class="card bg-neumo-pills m-0 h-100">
                                                    <div class="card-body  p-3">
                                                        <div class="row mb-3">
                                                            <label for="" class="col-4">Condition</label>
                                                            <div class="col-6">
                                                                <select name="condition" id=""
                                                                        class="form-select neumo-primary">
                                                                    <option value="0" selected class="bg-neumo">New
                                                                    </option>
                                                                    <option value="1" class="bg-neumo">Refurbished
                                                                    </option>
                                                                    <option value="2" class="bg-neumo">Used</option>
                                                                </select>
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
                </div>
                <div class="col-md-4">
                    <div class="card card-body accordion neumo-primary" id="accordionPublish" style="font-size: 12px">
                        <div class="accordion-item">
                            <h2 class="accordion-header border-bottom border-1 border-light">
                                <button class="accordion-button px-0 bg-neumo text-neumo" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                    Publish
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show px-0"
                                 data-bs-parent="#accordionPublish">
                                <div class="accordion-body bg-neumo">
                                    <div class="card-header px-0 bg-neumo">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <button type="submit" id="productStatusBtn"
                                                        class="btn btn-sm neumo-primary border-secondary-neumo text-secondary-neumo text-primary-size d-none">
                                                    Save Draft
                                                </button>
                                            </div>
                                            <div>
                                                <div id="productPreview"
                                                     class="btn  btn-sm neumo-primary border-secondary-neumo text-secondary-neumo text-primary-size">
                                                    Preview
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between my-2 text-neumo">
                                        <i class="bi bi-lamp-fill"></i>
                                        <span>Status :</span>
                                        <span id="statusInfo">Published</span>
                                        <input id="product-status" type="text" hidden name="status" value="0"/>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm" type="button">
                                                Edit
                                            </button>
                                            <button type="button"
                                                    class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                <span class="visually-hidden">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu neumo-primary">
                                                <li><a class="dropdown-item" href="#" onclick="productStatus(0)">Published</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#" onclick="productStatus(1)">Pending
                                                        Review</a></li>
                                                <li><a class="dropdown-item" href="#"
                                                       onclick="productStatus(2)">Draft</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2 text-neumo">
                                        <i class="bi bi-eye"></i>
                                        <span>Visibility :</span>
                                        <span id="visibilityInfo">Public</span>
                                        <input id="product-visibility" type="text" hidden name="visibility" value="0"/>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm" type="button">
                                                Edit
                                            </button>
                                            <button type="button"
                                                    class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                <span class="visually-hidden">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu neumo-primary">
                                                <li><a class="dropdown-item" href="#" onclick="productVisibility(0)">Public</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#" onclick="productVisibility(1)">Private</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#" onclick="productVisibility(2)">Only
                                                        for users</a></li>
                                            </ul>
                                        </div>

                                    </div>
                                    <div class="d-flex justify-content-between mb-2 text-neumo">
                                        <i class="bi bi-calendar3"></i>
                                        <span>Published On : </span>
                                        <div class="neumo-primary px-2 border-dark-neumo" style="width: 42%">
                                            <input type="text" name="published_date" id="publishedDate"
                                                   class="p-1 border-0 text-center w-100 h-100 bg-neumo"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-neumo">
                            <div class="d-flex justify-content-between">
                                <div class="d-column justify-content-center me-2">
                                    <div class=""><a href=""><i class="bi bi-clipboard"></i> Copy to a new draft</a>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" id="productPublished"
                                            class="btn btn-sm neumo-primary text-secondary-neumo border-secondary-neumo text-primary-size">
                                        Published
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-body accordion neumo-primary" id="accordionCategory" style="font-size: 12px">
                        <div class="accordion-item">
                            <h2 class="accordion-header border-bottom border-1 border-light">
                                <button class="accordion-button px-0 bg-neumo text-neumo" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true"
                                        aria-controls="collapseOne">
                                    Product Categories
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse show px-0"
                                 data-bs-parent="#accordionCategory">
                                <div class="accordion-body bg-neumo">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active text-secondary-neumo" id="one-tab-category"
                                                    data-bs-toggle="tab" data-bs-target="#one-category-tab-pane"
                                                    type="button" role="tab" aria-controls="home-tab-pane"
                                                    aria-selected="true">All Categories
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link text-secondary-neumo" id="two-tab-category"
                                                    data-bs-toggle="tab" data-bs-target="#two-category-tab-pane"
                                                    type="button" role="tab" aria-controls="profile-tab-pane"
                                                    aria-selected="false">Most Used
                                            </button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="p-3 tab-pane fade show active bg-neumo text-neumo"
                                             id="one-category-tab-pane" role="tabpanel"
                                             aria-labelledby="one-tab-category" tabindex="0">
                                            @if( count($categories) )
                                                @foreach( $categories as $category)
                                                    <label for="cat_{{ $category->id }}" class="me-1 mt-1"><input
                                                                type="checkbox" name="category[]"
                                                                id="cat_{{ $category->id }}" value="{{ $category->id }}"
                                                                class="me-2"/>{{ $category->name }}</label>
                                                @endforeach
                                            @else
                                                <span>No Category yet !!</span>
                                            @endif
                                        </div>
                                        <div class="p-3 tab-pane fade neumo-bg text-neumo" id="two-category-tab-pane"
                                             role="tabpanel" aria-labelledby="two-tab-category" tabindex="0">
                                            <label for="" class="me-1 mt-1"><input type="checkbox" name="" id=""
                                                                                   class="me-2"/>Lunch</label>
                                            <label for="" class="me-1 mt-1"><input type="checkbox" name="" id=""
                                                                                   class="me-2"/>Lunch</label>
                                            <label for="" class="me-1 mt-1"><input type="checkbox" name="" id=""
                                                                                   class="me-2"/>Lunch</label>
                                            <label for="" class="me-1 mt-1"><input type="checkbox" name="" id=""
                                                                                   class="me-2"/>Lunch</label>
                                            <label for="" class="me-1 mt-1"><input type="checkbox" name="" id=""
                                                                                   class="me-2"/>Lunch</label>
                                            <label for="" class="me-1 mt-1"><input type="checkbox" name="" id=""
                                                                                   class="me-2"/>Lunch</label>
                                        </div>
                                    </div>

                                    <p class="mt-3">
                                        <button class="btn  btn-sm border-secondary-neumo neumo-primary text-primary-neumo"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseCategory" aria-expanded="false"
                                                aria-controls="collapseCategory">
                                            <i class="bi bi-plus"></i>Add a new category
                                        </button>
                                    </p>
                                    <div class="collapse" id="collapseCategory">
                                        <div class="card card-body p-1 bg-neumo" style="box-shadow: none;">
                                            <form action="" method="post">
                                                <div class="row mb-1 g-0">
                                                    <div class="col-9">
                                                        <input type="text"
                                                               class="form-control w-100 rounded-0 text-primary-size"/>
                                                    </div>
                                                    <div class="col-3">
                                                        <input type="submit"
                                                               class="btn btn-dark btn-sm w-100 h-100 rounded-0 text-primary-size"
                                                               value="ADD" id=""/>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-body accordion neumo-primary text-primary-size" id="accordionTag">
                        <div class="accordion-item">
                            <h2 class="accordion-header border-bottom border-1 border-light">
                                <button class="accordion-button px-0 bg-neumo text-neumo" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true"
                                        aria-controls="collapseOne">
                                    Product tags
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse show px-0"
                                 data-bs-parent="#accordionTag">
                                <div class="accordion-body bg-neumo">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active text-secondary-neumo" id="tab-tag-one"
                                                    data-bs-toggle="tab" data-bs-target="#one-tag-tab-pane"
                                                    type="button" role="tab" aria-controls="home-tab-pane"
                                                    aria-selected="true">All Tags
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link text-secondary-neumo" id="tab-tag-two"
                                                    data-bs-toggle="tab" data-bs-target="#two-tag-tab-pane"
                                                    type="button" role="tab" aria-controls="profile-tab-pane"
                                                    aria-selected="false">Most Used
                                            </button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="p-3 tab-pane fade show active bg-neumo" id="one-tag-tab-pane"
                                             role="tabpanel" aria-labelledby="tab-tag-one" tabindex="0">
                                            <label for="" class="me-1 mt-1"><input type="checkbox" name="" id=""
                                                                                   class="me-2"/>Lunch</label>
                                            <label for="" class="me-1 mt-1"><input type="checkbox" name="" id=""
                                                                                   class="me-2"/>Lunch</label>
                                            <label for="" class="me-1 mt-1"><input type="checkbox" name="" id=""
                                                                                   class="me-2"/>Lunch</label>
                                        </div>
                                        <div class="p-3 tab-pane fade bg-neumo" id="two-tag-tab-pane" role="tabpanel"
                                             aria-labelledby="tab-tag-two" tabindex="0">
                                            <label for="" class="me-1 mt-1"><input type="checkbox" name="" id=""
                                                                                   class="me-2"/>Lunch</label>
                                            <label for="" class="me-1 mt-1"><input type="checkbox" name="" id=""
                                                                                   class="me-2"/>Lunch</label>
                                            <label for="" class="me-1 mt-1"><input type="checkbox" name="" id=""
                                                                                   class="me-2"/>Lunch</label>
                                            <label for="" class="me-1 mt-1"><input type="checkbox" name="" id=""
                                                                                   class="me-2"/>Lunch</label>
                                            <label for="" class="me-1 mt-1"><input type="checkbox" name="" id=""
                                                                                   class="me-2"/>Lunch</label>
                                            <label for="" class="me-1 mt-1"><input type="checkbox" name="" id=""
                                                                                   class="me-2"/>Lunch</label>
                                        </div>
                                    </div>

                                    <p class="mt-3">
                                        <button class="btn  btn-sm border-secondary-neumo neumo-primary text-primary-neumo"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#collapseTag"
                                                aria-expanded="false" aria-controls="collapseTag">
                                            <i class="bi bi-plus"></i>Add a new Tag
                                        </button>
                                    </p>
                                    <div class="collapse" id="collapseTag">
                                        <div class="card card-body p-1 bg-neumo" style="box-shadow: none;">
                                            <form action="" method="post">
                                                <div class="row mb-1 g-0">
                                                    <div class="col-9">
                                                        <input type="text"
                                                               class="form-control w-100 rounded-0 text-primary-size"/>
                                                    </div>
                                                    <div class="col-3">
                                                        <input type="submit"
                                                               class="btn btn-dark btn-sm w-100 h-100 rounded-0 text-primary-size"
                                                               value="ADD" id=""/>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-body accordion neumo-primary text-primary-size" id="accordionGallery">
                        <div class="accordion-item">
                            <h2 class="accordion-header border-bottom border-1 border-light">
                                <button class="accordion-button px-0 bg-neumo text-neumo" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true"
                                        aria-controls="collapseFour">
                                    Product Gallery
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse  px-0"
                                 data-bs-parent="#accordionGallery">
                                <div class="accordion-body bg-neumo">
                                    ....///
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card neumo-primary">
                        <div class="d-flex  justify-content-between border-bottom border-1 border-light ">
                            <div class="title p-2">
                                Product Image
                            </div>
                            <div class="btn btn-sm text-secondary-neumo" data-bs-toggle="collapse"
                                 data-bs-target="#collapseImage" aria-expanded="false" aria-controls="collapseImage">
                                <i class="bi bi-arrows-collapse"></i>
                            </div>
                        </div>
                        <div class="card-body collapse show p-0" id="collapseImage">
                            <div class="card-text p-3">
                                {{--                                <div class="AppBody bg-neumo">--}}
                                {{--                                    <div class="icon" onclick="document.getElementById('prdoductImage').click();" style="cursor: pointer;">--}}
                                {{--                                        <i class="bi bi-cloud-arrow-up"></i>--}}
                                {{--                                    </div>--}}

                                {{--                                    <h3>Drag & Drop</h3>--}}
                                {{--                                    <span>OR</span>--}}

                                {{--                                    <button class="btn btn-sm neumo-primary" id="imgUploadBtn" onclick="event.preventDefault(); document.getElementById('prdoductImage').click();">Browse File</button>--}}
                                {{--                                    <input id="prdoductImage" type="file" hidden name="image"/>--}}
                                {{--                                </div>--}}
                                {{--                                <input id="prdoductImage" type="file"  name="image"/>--}}

                                <div class="upload">
                                    <img id="image" class="h-100 w-100"
                                         src="https://t4.ftcdn.net/jpg/02/17/88/73/360_F_217887350_mDfLv2ootQNeffWXT57VQr8OX7IvZKvB.jpg"
                                         alt="">

                                    <div class="rightRound neumo-primary" id="upload">
                                        <input type="file" name="image" id="fileImg" accept=".jpg, .jpeg, .png"/>
                                        <i class="bi bi-camera"></i>
                                    </div>

                                    <div class="leftRound neumo-primary d-none" id="cancel">
                                        <i class="bi bi-x"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

@endsection

@section('app-scripts')
    <script type="text/javascript">

        function productStatus(status) {

            let productStatusBtn = document.getElementById('productStatusBtn');
            let statusInfo = document.getElementById('statusInfo');
            let productPublished = document.getElementById('productPublished');
            let product_status = document.getElementById('product-status');

            if (status === 0) {

                productStatusBtn.style.display = 'none';
                statusInfo.innerHTML = 'Published';
                productPublished.style.display = 'block';
                product_status.value = 0;


            } else if (status === 1) {

                productStatusBtn.setAttribute('style', 'display:block !important');
                productStatusBtn.innerHTML = 'Pending Review';
                statusInfo.innerHTML = 'Pending Review';
                productPublished.style.display = 'none';
                product_status.value = 1;

            } else if (status === 2) {

                productStatusBtn.setAttribute('style', 'display:block !important');
                productStatusBtn.innerHTML = 'Save Draft';
                statusInfo.innerHTML = 'Draft';
                productPublished.style.display = 'none';
                product_status.value = 2;

            }

        }

        function productVisibility(visibility) {

            let visibilityInfo = document.getElementById('visibilityInfo');
            let product_visibility = document.getElementById('product-visibility');

            if (visibility === 0) {

                visibilityInfo.innerHTML = 'Public';
                product_visibility.value = 0;

            } else if (visibility === 1) {

                visibilityInfo.innerHTML = 'Private';
                product_visibility.value = 1;

            } else if (visibility === 2) {

                visibilityInfo.innerHTML = 'Only for users';
                product_visibility.value = 2;

            }
        }


        $('#summernote').summernote({
            placeholder: 'Write Here Your Product Descriptions ',
            tabsize: 2,
            height: 422,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                // ['view', ['fullscreen', 'codeview', 'help']]
                ['view', ['codeview', 'help']]
            ]
        });

        $("#startSalePriceDate").flatpickr({
            minDate: "today",
            dateFormat: "Y-m-d"
        });

        $("#endSalePriceDate").flatpickr({
            minDate: "today",
            dateFormat: "Y-m-d"
        });

        $("#publishedDate").flatpickr({
            minDate: "today",
            defaultDate: ['today'],
            dateFormat: "Y-m-d",
        });

        document.getElementById("fileImg").onchange = function () {
            document.getElementById("image").src = URL.createObjectURL(fileImg.files[0]); // Preview new image

            document.getElementById("cancel").setAttribute('style', 'display:block !important');
            ;
            document.getElementById("upload").style.display = "none";
        }

        let productImage = document.getElementById('image').src;

        document.getElementById("cancel").onclick = function () {
            document.getElementById("image").src = productImage; // Back to previous image

            document.getElementById("cancel").setAttribute('style', 'display:none !important');
            document.getElementById("upload").style.display = "block";
        }

    </script>
@endsection
