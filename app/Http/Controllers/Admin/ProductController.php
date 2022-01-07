<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller {
    public function form() {
        $categories = Category::all()->sortBy('name');
        return view('admin.add_product', compact('categories'));
    }

    public function add(Request $request) {
        $request->validate([
            'name'          => 'required|string|min:5',
            'description'   => 'required|string|between:15,500',
            'price'         => 'required|numeric|between:1000,10000000',
            'stock'         => 'required|numeric|between:1,10000',
            'image'         => 'required|image|mimes:jpeg,png,jpg',
            'category'      => 'required|numeric|exists:categories,id',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '-' . $request->input('name') . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('products', $imageName, 'public');
            $path = 'storage/' . $path;
        }

        Product::create([
            'name'          => $request->input('name'),
            'description'   => $request->input('description'),
            'price'         => $request->input('price'),
            'stock'         => $request->input('stock'),
            'image'         => $path,
            'category_id'   => $request->input('category'),
        ]);

        Session::flash('success', 'Product ' . $request->input('name') . ' added successfully');
        return redirect()->route('products');
    }
}
