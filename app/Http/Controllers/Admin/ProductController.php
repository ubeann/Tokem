<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller {
    public function formAdd() {
        $categories = Category::all()->sortBy('name');
        return view('admin.add_product', compact('categories'));
    }

    public function add(Request $request) {
        if ($request->has('cancel')) {
            return redirect()->route('products');
        } else {
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
                $path = '/storage/' . $path;
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

    public function formEdit($id) {
        $product = Product::find($id);
        if (!$product) {
            Session::flash('error', 'Product not found');
            return redirect()->route('products');
        }
        $categories = Category::all()->sortBy('name');
        return view('admin.edit_product', compact('product', 'categories'));
    }

    public function edit(Request $request, $id) {
        if ($request->has('cancel')) {
            return redirect()->route('products');
        } else {
            $request->validate([
                'description'   => 'required|string|between:15,500',
                'price'         => 'required|numeric|between:1000,10000000',
                'stock'         => 'required|numeric|between:1,10000',
                'image'         => 'image|mimes:jpeg,png,jpg',
            ]);

            $product = Product::find($id);
            if (!$product) {
                Session::flash('error', 'Product not found');
                return redirect()->route('products');
            }

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '-' . $product->name . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('products', $imageName, 'public');
                $path = '/storage/' . $path;

                if ($product->image) {
                    $oldImage = $product->image;
                    $oldImage = str_replace('/storage', '', $oldImage);
                    Storage::disk('public')->delete($oldImage);
                }
            } else {
                $path = $product->image;
            }

            $product->update([
                'description'   => $request->input('description'),
                'price'         => $request->input('price'),
                'stock'         => $request->input('stock'),
                'image'         => $path,
            ]);

            Session::flash('success', 'Product ' . $product->name . ' edited successfully');
            return redirect()->route('products');
        }
    }

    public function delete($id) {
        $product = Product::find($id);
        if (!$product) {
            Session::flash('error', 'Product not found');
            return redirect()->route('products');
        } else {
            if ($product->image) {
                $oldImage = $product->image;
                $oldImage = str_replace('/storage', '', $oldImage);
                Storage::disk('public')->delete($oldImage);
            }
            $product->delete();
            return redirect()->route('products')->with('success', 'Product ' . $product->name . ' deleted successfully');
        }
    }
}