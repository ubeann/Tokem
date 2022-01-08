@extends('layouts.app')

@section('content')
<form class="container bg-trasparent my-4 p-3" style="position: relative;">
    @csrf
    <h2>Please confirm your order</h2>
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
                    <td>
                        <input type="number" class="form-control" value="{{$item->quantity}}" name="quantity[{{$item->product->id}}]">
                    </td>
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
    @if ($cart->count() > 0)
        <a href="{{ route('member.checkout') }}" type="submit" class="btn btn-primary">Checkout</a>
    @endif
</form>

<style>
    .form-control {
        max-width: 55px;
    }
</style>
@endsection
