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

    function categoryUpdate() {
        return view('rioAdmin.category.update');
    }

    function update() {
        //
    }

    function detail() {
        return view('rioAdmin.category.detail');
    }

    function status() {
        //
    }

    function delete() {
        //
    }
}
