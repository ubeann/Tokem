<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller {
    public function index() {
        $transactions = Transaction::latest()
            ->where('user_id', auth()->user()->id)
            ->paginate(12);
        return view('member.transaction', compact('transactions'));
    }

    public function checkout(Request $request) {
        $cart = Cart::where('user_id', auth()->user()->id)
            ->whereNull('transaction_id')
            ->orderBy('sub_total', 'desc')
            ->get();
        if ($cart->count() == 0) {
            Session::flash('error', 'Your cart is empty, please add some products');
            return redirect()->route('products');
        } else {
            $length = 6;
            $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $passcode = substr(str_shuffle($permitted_chars), 0, $length);
            return view('member.checkout', compact('cart', 'passcode'));
        }
    }

    public function store(Request $request) {
        $cart = Cart::where('user_id', auth()->user()->id)
            ->whereNull('transaction_id')
            ->orderBy('sub_total', 'desc')
            ->get();
        if ($cart->count() == 0) {
            Session::flash('error', 'Your cart is empty, please add some products');
            return redirect()->route('products');
        } else {
            $request->validate([
                'confirm' => 'required|string|max:6',
            ]);
            if ($request->input('confirm') != $request->passcode) {
                Session::flash('error', 'Your confirmation code is wrong');
                return redirect()->route('member.checkout');
            } else {
                $transaction = Transaction::create([
                    'user_id' => auth()->user()->id,
                    'grand_total' => $cart->sum('sub_total'),
                ]);
                foreach ($cart as $item) {
                    Cart::where('id', $item->id)
                        ->update([
                            'transaction_id' => $transaction->id
                        ]);
                    Product::where('id', $item->product_id)
                        ->decrement('stock', $item->quantity);
                }
                Session::flash('success', 'Transaction success, you will receive your order soon! Thank you for shopping with us!');
                return redirect()->route('member.transaction');
            }
        }
    }
}
