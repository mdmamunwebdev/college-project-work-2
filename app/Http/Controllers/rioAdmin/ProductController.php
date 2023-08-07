<?php

namespace App\Http\Controllers\rioAdmin;

use App\Http\Controllers\Controller;
use App\Models\rioAdmin\Category;
use App\Models\rioAdmin\Tag;
use App\Models\rioAdmin\Product;
use App\Models\rioAdmin\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;

    function index() {
        return view('rioAdmin.product.index', ['products' => Product::orderBy('id', 'desc')->get()]);
    }

    function productCreateForm() {
        return view('rioAdmin.product.create', ['categories' => Category::all(), 'tags' => Tag::all()]);
    }

    function create(Request $request) {
       $this->product = Product::productAdd($request);
       ProductCategory::addPrductCat($this->product, $request);

       return redirect('/product/list')->with('productAddMsg', 'A new product has been added successfully.');
    }

    function productUpdateForm($id) {
        return view('rioAdmin.product.update', ['product' => Product::find($id), 'categories' => Category::all()]);
    }

    function update(Request $request, $id) {
        $this->product = Product::productUpdate($request, $id);
        ProductCategory::updateProductCat($this->product, $request);

        return redirect('/product/list')->with('productUpdateMsg', 'Your update has completed successfully.');
    }

    function detail() {
        return view('rioAdmin.product.detail');
    }

    function status() {
        //
    }

    function delete($id) {
        Product::productDelete($id);

        return redirect('/product/list')->with('productDeleteMsg', 'A product has been deleted successfully.');
    }
}
