
    <div class="card card-body accordion neumo-primary" id="accordionCategory" style="font-size: 12px">
                        <div class="accordion-item">
                            <h2 class="accordion-header border-bottom border-1 border-light">
                                <button class="accordion-button px-0 bg-neumo text-neumo" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
    Product Categories
</button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse show px-0" data-bs-parent="#accordionCategory">
                                <div class="accordion-body bg-neumo">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active text-secondary-neumo" id="one-tab-category" data-bs-toggle="tab" data-bs-target="#one-category-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">All Categories</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link text-secondary-neumo" id="two-tab-category" data-bs-toggle="tab" data-bs-target="#two-category-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Most Used</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="p-3 tab-pane fade show active bg-neumo text-neumo" id="one-category-tab-pane" role="tabpanel" aria-labelledby="one-tab-category" tabindex="0">
@foreach( $categories as $category)
    <label for="cat_{{ $category->id }}" class="me-1 mt-1"><input type="checkbox" name="category[]" id="cat_{{ $category->id }}" value="{{ $category->id }}" class="me-2"/>{{ $category->title }}</label>
    @endforeach
    </div>
    <div class="p-3 tab-pane fade neumo-bg text-neumo" id="two-category-tab-pane" role="tabpanel" aria-labelledby="two-tab-category" tabindex="0">
        <label for="" class="me-1 mt-1"><input type="checkbox" name="" id="" class="me-2"/>Lunch</label>
        <label for="" class="me-1 mt-1"><input type="checkbox" name="" id="" class="me-2"/>Lunch</label>
        <label for="" class="me-1 mt-1"><input type="checkbox" name="" id="" class="me-2"/>Lunch</label>
        <label for="" class="me-1 mt-1"><input type="checkbox" name="" id="" class="me-2"/>Lunch</label>
        <label for="" class="me-1 mt-1"><input type="checkbox" name="" id="" class="me-2"/>Lunch</label>
        <label for="" class="me-1 mt-1"><input type="checkbox" name="" id="" class="me-2"/>Lunch</label>
    </div>
    </div>

    <p class="mt-3">
        <button class="btn  btn-sm border-secondary-neumo neumo-primary text-primary-neumo" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCategory" aria-expanded="false" aria-controls="collapseCategory">
            <i class="bi bi-plus"></i>Add a new category
        </button>
    </p>
    <div class="collapse" id="collapseCategory">
        <div class="card card-body p-1 bg-neumo" style="box-shadow: none;">
            <form action="{{ route('category.create') }}" method="post">
                @csrf

                <div class="row mb-1 g-0">
                    <div class="col-9">
                        <input type="text" class="form-control w-100 rounded-0" style="font-size: 12px;"/>
                    </div>
                    <div class="col-3">
                        <input type="submit" class="btn btn-dark btn-sm w-100 h-100 rounded-0" value="ADD" id="" style="font-size: 12px;"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    <div class="card card-body accordion neumo-primary" id="accordionTag" style="font-size: 12px">
        <div class="accordion-item">
            <h2 class="accordion-header border-bottom border-1 border-light">
                <button class="accordion-button px-0 bg-neumo text-neumo" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
                    Product tags
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse show px-0" data-bs-parent="#accordionTag">
                <div class="accordion-body bg-neumo">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active text-secondary-neumo" id="tab-tag-one" data-bs-toggle="tab" data-bs-target="#one-tag-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">All Tags</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-secondary-neumo" id="tab-tag-two" data-bs-toggle="tab" data-bs-target="#two-tag-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Most Used</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="p-3 tab-pane fade show active bg-neumo" id="one-tag-tab-pane" role="tabpanel" aria-labelledby="tab-tag-one" tabindex="0">
                            <label for="" class="me-1 mt-1"><input type="checkbox" name="" id="" class="me-2"/>Lunch</label>
                            <label for="" class="me-1 mt-1"><input type="checkbox" name="" id="" class="me-2"/>Lunch</label>
                            <label for="" class="me-1 mt-1"><input type="checkbox" name="" id="" class="me-2"/>Lunch</label>
                        </div>
                        <div class="p-3 tab-pane fade bg-neumo" id="two-tag-tab-pane" role="tabpanel" aria-labelledby="tab-tag-two" tabindex="0">
                            <label for="" class="me-1 mt-1"><input type="checkbox" name="" id="" class="me-2"/>Lunch</label>
                            <label for="" class="me-1 mt-1"><input type="checkbox" name="" id="" class="me-2"/>Lunch</label>
                            <label for="" class="me-1 mt-1"><input type="checkbox" name="" id="" class="me-2"/>Lunch</label>
                            <label for="" class="me-1 mt-1"><input type="checkbox" name="" id="" class="me-2"/>Lunch</label>
                            <label for="" class="me-1 mt-1"><input type="checkbox" name="" id="" class="me-2"/>Lunch</label>
                            <label for="" class="me-1 mt-1"><input type="checkbox" name="" id="" class="me-2"/>Lunch</label>
                        </div>
                    </div>

                    <p class="mt-3">
                        <button class="btn  btn-sm border-secondary-neumo neumo-primary text-primary-neumo" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTag" aria-expanded="false" aria-controls="collapseTag">
                            <i class="bi bi-plus"></i>Add a new Tag
                        </button>
                    </p>
                    <div class="collapse" id="collapseTag">
                        <div class="card card-body p-1 bg-neumo" style="box-shadow: none;">
                            <form action="" method="post">
                                <div class="row mb-1 g-0">
                                    <div class="col-9">
                                        <input type="text" class="form-control w-100 rounded-0" style="font-size: 12px;"/>
                                    </div>
                                    <div class="col-3">
                                        <input type="submit" class="btn btn-dark btn-sm w-100 h-100 rounded-0" value="ADD" id="" style="font-size: 12px;"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-body accordion neumo-primary" id="accordionGallery" style="font-size: 12px">
        <div class="accordion-item">
            <h2 class="accordion-header border-bottom border-1 border-light">
                <button class="accordion-button px-0 bg-neumo text-neumo" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                    Product Gallery
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse  px-0" data-bs-parent="#accordionGallery">
                <div class="accordion-body bg-neumo">
                    ....///
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-body neumo-primary p-0">
                <input type="text" class="form-control" name="name" placeholder="Title : New Product"/>
            </div>
        </div>
        <div class="col-12">
            <div class="card card-body neumo-primary p-0">
                <textarea name="description" class="form-control " id="summernote" cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="col-12">
            <div class="card neumo-primary" style="font-size: 12px; height: 360px;">
                <div class="card-header bg-neumo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-fill-gear" viewBox="0 0 16 16">
                        <path d="M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1Z"/>
                        <path d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12.31 12.31 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7Zm6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.552 4.552 0 0 1 .23-2.002Zm-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.507 4.507 0 0 1-1.3-1.905Zm3.631-4.538c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                    </svg>
                    <span class="ms-2">Additional Data</span>
                </div>
                <div class="card-body p-3">
                    <div class="d-flex align-items-start h-100">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link active rounded-0" id="v-pills-general-tab" data-bs-toggle="pill" data-bs-target="#v-pills-general" type="button" role="tab" aria-controls="v-pills-general" aria-selected="true">General</button>
                            <button class="nav-link rounded-0" id="v-pills-inventory-tab" data-bs-toggle="pill" data-bs-target="#v-pills-inventory" type="button" role="tab" aria-controls="v-pills-inventory" aria-selected="true">Inventory</button>
                            <button class="nav-link rounded-0" id="v-pills-shipping-tab" data-bs-toggle="pill" data-bs-target="#v-pills-shipping" type="button" role="tab" aria-controls="v-pills-shipping" aria-selected="false">Shipping</button>
                            <button class="nav-link rounded-0" id="v-pills-advance-tab" data-bs-toggle="pill" data-bs-target="#v-pills-advance" type="button" role="tab" aria-controls="v-pills-advance" aria-selected="false">Advance</button>
                        </div>
                        <div class="tab-content flex-grow-1 h-100" id="v-pills-tabContent">
                            <div class="tab-pane fade show active h-100" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab" tabindex="0">
                                <div class="card bg-neumo-pills m-0 h-100">
                                    <div class="card-body  p-3">
                                        <div class="row mb-3">
                                            <label for="" class="col-4">Regular Price</label>
                                            <div class="col-4">
                                                <input type="number" name="regular_price" id="" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-4">Sale Price</label>
                                            <div class="col-4">
                                                <input type="number" name="sale_price" id="" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-4">Sale Price Date</label>
                                            <div class="col-8">
                                                <div class="row mb-3">
                                                    <div class="col-12">
                                                        <input type="date" name="start_sale_price_date" id="startSalePriceDate" class="form-control"  placeholder="From… YYYY-MM-DD"/>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-12">
                                                        <input type="date" name="end_sale_price_date" id="endSalePriceDate" class="form-control" placeholder="To… YYYY-MM-DD"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade h-100" id="v-pills-inventory" role="tabpanel" aria-labelledby="v-pills-inventory-tab" tabindex="0">
                                <div class="card bg-neumo-pills m-0 h-100">
                                    <div class="card-body  p-3">
                                        <div class="row mb-3">
                                            <label for="" class="col-4">Stock Status</label>
                                            <div class="col-6">
                                                <div class="radio-container">
                                                    <div class="radio-wrapper">
                                                        <label class="radio-button">
                                                            <input type="radio" name="stock_status" value="0" id="option1" checked />
                                                            <span class="radio-checkmark"></span>
                                                            <span class="radio-label">In stock</span>
                                                        </label>
                                                    </div>

                                                    <div class="radio-wrapper">
                                                        <label class="radio-button">
                                                            <input type="radio" name="stock_status" value="1" id="option2" />
                                                            <span class="radio-checkmark"></span>
                                                            <span class="radio-label">Out of stock</span>
                                                        </label>
                                                    </div>

                                                    <div class="radio-wrapper">
                                                        <label class="radio-button">
                                                            <input type="radio" name="stock_status" value="2" id="option3" />
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
                            <div class="tab-pane fade h-100" id="v-pills-shipping" role="tabpanel" aria-labelledby="v-pills-shipping-tab" tabindex="0">
                                <div class="card bg-neumo-pills m-0 h-100">
                                    <div class="card-body  p-3">
                                        <div class="row mb-3">
                                            <label for="" class="col-4">Weight(kg)</label>
                                            <div class="col-6">
                                                <input type="number" name="weight" id="" class="form-control" placeholder="0">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-4">Dimensions(cm)</label>
                                            <div class="col-8">
                                                <div class="row g-2">
                                                    <div class="col-4">
                                                        <input type="number" name="length" id="" class="form-control" placeholder="Length"/>
                                                    </div>
                                                    <div class="col-4">
                                                        <input type="number" name="width" id="" class="form-control" placeholder="Width"/>
                                                    </div>
                                                    <div class="col-4">
                                                        <input type="number" name="height" id="" class="form-control" placeholder="Height"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade h-100" id="v-pills-advance" role="tabpanel" aria-labelledby="v-pills-advance-tab" tabindex="0">
                                <div class="card bg-neumo-pills m-0 h-100">
                                    <div class="card-body  p-3">
                                        <div class="row mb-3">
                                            <label for="" class="col-4">Condition</label>
                                            <div class="col-6">
                                                <select name="condition" id="" class="form-select neumo-primary">
                                                    <option value="0" selected class="bg-neumo">New</option>
                                                    <option value="1" class="bg-neumo">Refurbished</option>
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
