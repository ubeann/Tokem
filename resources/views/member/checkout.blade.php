@extends('layouts.app')

@section('content')
<form class="container bg-trasparent my-4 p-3" style="position: relative;" method="POST">
    @csrf
    <h2>Your Cart</h2>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Product</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th class="text-end" scope="col">Sub Total</th>
        </tr>
        </thead>
        <tbody>
            @forelse($cart as $item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->product->name}}</td>
                    <td>{{"Rp " . number_format($item->product->price,2,',','.')}}</td>
                    <td>{{$item->quantity}}</td>
                    <td class="text-end">{{"Rp " . number_format($item->sub_total,2,',','.')}}</td>
                </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No item in cart</td>
                    </tr>
            @endforelse
            @if ($cart->count() > 0)
                <tr>
                    <td colspan="4" class="text-right">Total</td>
                    <td class="text-end">{{"Rp " . number_format($cart->sum('sub_total'),2,',','.')}}</td>
                </tr>
            @endif
        </tbody>
    </table>
    <div class="form-group my-2 mb-4">
        <label for="confirm">Please enter following passcode to checkout : <strong id="code">{{$passcode}}</strong></label>
        <input name="confirm" type="text" class="form-control" id="confirm" autofocus>
        <input type="hidden" name="passcode" value="{{$passcode}}">
    </div>
    <button type="submit" class="btn btn-primary">Checkout</button>
</form>
@endsection
