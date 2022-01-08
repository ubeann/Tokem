<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller {
    public function index() {
        $cart = Cart::latest()
            ->where('user_id', auth()->user()->id)
            ->whereNull('transaction_id')
            ->get();
        return view('member.cart', compact('cart'));
    }

    public function initiate($id) {
        if (Auth::check()) {
            $product = Product::find($id);
            if (!$product) {
                Session::flash('error', 'Product not found');
                return redirect()->route('products');
            } else {
                $cart = Cart::where('user_id', auth()->user()->id)
                    ->where('product_id', $id)
                    ->whereNull('transaction_id')
                    ->first();
                if ($cart) {
                    if ($cart->quantity < $product->stock) {       
                        Cart::where('user_id', auth()->user()->id)
                        ->where('product_id', $id)
                        ->whereNull('transaction_id')
                        ->update([
                            'quantity' => $cart->quantity + 1,
                            'sub_total' => ($cart->quantity + 1) * $cart->product->price,
                        ]);
                    } else {
                        Session::flash('error', 'Product ' . $product->name . ' already in cart with quantity ' . $cart->quantity . ' and cannot exceed ' . $product->stock . ' stock unit');
                    }
                } else {
                    Cart::create([
                        'user_id' => auth()->user()->id,
                        'product_id' => $id,
                        'quantity' => 1,
                        'sub_total' => $product->price,
                    ]);
                }
                Session::flash('success', 'Product ' . $product->name . ' added to cart');
                return redirect()->route('products');
            }
        } else {
            Session::flash('error', 'Please login first');
            return redirect()->back();
        }
    }

    public function add(Request $request, $id) {
        if (Auth::check()) {
            $product = Product::find($id);
            if (!$product) {
                Session::flash('error', 'Product not found');
                return redirect()->route('products');
            } else {
                $cart = Cart::where('user_id', auth()->user()->id)
                    ->where('product_id', $id)
                    ->whereNull('transaction_id')
                    ->first();
                if ($cart) {
                    if ($cart->quantity < $product->stock) {  
                        $request->validate([
                            'quantity' => 'required|numeric|min:1|max:' . ($product->stock - $cart->quantity),
                        ]);     
                        Cart::where('user_id', auth()->user()->id)
                        ->where('product_id', $id)
                        ->whereNull('transaction_id')
                        ->update([
                            'quantity' => $cart->quantity + $request->input('quantity'),
                            'sub_total' => ($cart->quantity + $request->input('quantity')) * $cart->product->price,
                        ]);
                        Session::flash('success', 'Product ' . $product->name . ' added to cart');
                    } else {
                        Session::flash('error', 'Product ' . $product->name . ' already in cart with quantity ' . $cart->quantity . ' and cannot exceed ' . $product->stock . ' stock unit');
                        return redirect()->back()->withInput();
                    }
                } else {
                    $request->validate([
                        'quantity' => 'required|integer|min:1|max:' . $product->stock,
                    ]);
                    Cart::create([
                        'user_id' => auth()->user()->id,
                        'product_id' => $id,
                        'quantity' => $request->quantity,
                        'sub_total' => $product->price * $request->quantity,
                    ]);
                    Session::flash('success', 'Product ' . $product->name . ' added to cart');
                }
                return redirect()->route('products');
            }
        } else {
            Session::flash('error', 'Please login first');
            return redirect()->back();
        }
    }

    public function update(Request $request, $id) {
        $cart = Cart::find($id);
        if (!$cart) {
            Session::flash('error', 'Product not found');
            return redirect()->route('member.cart');
        } else {
            $product = Product::find($cart->product_id);
            if (!$product) {
                Session::flash('error', 'Product not found');
                return redirect()->route('member.cart');
            } else {
                if ($request->input('quantity') == 0) {
                    $cart->delete();
                    Session::flash('success', 'Product ' . $product->name . ' removed from cart');
                } else {
                    if ($request->input('quantity') > $product->stock) {
                        Session::flash('error', 'Product ' . $product->name . ' cannot exceed ' . $product->stock . ' stock unit');
                        return redirect()->back()->withInput();
                    } else if ($request->input('quantity') < 0) {
                        Session::flash('error', 'Product ' . $product->name . ' cannot be less than 0');
                        return redirect()->back()->withInput();
                    } else {
                        $cart->update([
                            'quantity' => $request->input('quantity'),
                            'sub_total' => $request->input('quantity') * $product->price,
                        ]);
                        Session::flash('success', 'Product ' . $product->name . ' quantity updated');
                    }
                }
                return redirect()->route('member.cart');
            }
        }
    }
}