<?php

namespace App\Http\Controllers\rioAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\rioAdmin\Category;

class CategoryController extends Controller
{
    function index() {
        return view('rioAdmin.category.index', ['categories' => Category::all()]);
    }

    function create(Request $request) {

        Category::categoryNew($request);

        return redirect()->back()->with('addCatMsg', 'Category is added with successfully !!');
    }

    function categoryUpdate($id) {
        return view('rioAdmin.category.update', ['category' => Category::find($id), 'categories' => Category::all()]);
    }

    function update(Request $request, $id) {
        Category::categoryUpdate($request, $id);
        return redirect('/category')->with('cat_update_msg', 'Category has updated successfully.');
    }

    function detail() {
        return view('rioAdmin.category.detail');
    }

    function status($id) {
        Category::categoryStatus($id);
        return redirect('/category')->with('cat_status_msg', 'Category status has changed successfully.');
    }

    function delete($id) {
        Category::categoryDelete($id);
        return redirect('/category')->with('cat_delete_msg', 'Category has deleted successfully.');
    }
}
