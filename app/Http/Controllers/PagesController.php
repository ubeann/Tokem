<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller {

    public function index() {
        return view('landing');
    }

    public function about() {
        return view('about-us');
    }

    public function products(Request $request) {
        $search = $request->search ?? false;
        if ($search) {
            $products = Product::latest()->where('name', 'like', '%' . $search . '%')->paginate(12);
            $products->appends(['search' => $search]);
        } else {
            $products = Product::latest()->paginate(12);
        }
        return view('products', compact('products', 'search'));
    }

    public function productDetail($id) {
        $product = Product::find($id);
        if (!$product) {
            Session::flash('error', 'Product not found');
            return redirect()->route('products');
        }
        return view('detail', compact('product'));
    }
}