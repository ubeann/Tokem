<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {

    public function index() {
        $category = Category::all()->sortBy('name');
        return view('admin.add_category', compact('category'));
    }

    public function add(Request $request) {
        $request->validate([
            'name' => 'required|alpha|unique:categories',
        ]);
        Category::create($request->all());
        return redirect()->route('admin.add_category')->with('success', 'Category ' . $request->input('name') . ' added successfully');
    }
}
