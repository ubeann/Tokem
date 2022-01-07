<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
        } else {
            $products = Product::paginate(12);
        }
        return view('products', compact('products', 'search'));
    }
}
