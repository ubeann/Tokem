@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <img src="{{$product->image}}" class="img-thumbnail img-fluid" alt="{{$product->name}}">
        </div>
        <div class="col-6">
            <h2>{{$product->name}}</h2>
            <p>{{$product->description}}</p>
            <p>Kategori : {{$product->category->name}}</p>
            <p>Stok : {{$product->stock > 0 ? $product->stock : "habis"}}</p>
            <p>Harga : {{"Rp " . number_format($product->price,2,',','.')}}</p>
            @if(((Auth::check() and Auth::user()->role != 'admin') or !Auth::check()) and $product->stock > 0)
              {{-- KALO ADMIN GADA TOMBOL ADD TO CART --}}
              <form class="input-group justify-content-end" method="POST" action="{{route('add-to-cart', $product->id)}}">
                @csrf
                <div class="form-outline">
                  <input name="quantity" type="number" placeholder="Quantity" id="quantity" class="form-control" value="{{old('quantity')}}"/>
                </div>
                <button type="submit" class="btn btn-primary">
                  <i class="bi bi-cart"></i>
                  Add to cart
                </button>
              </form>
            @endif
        </div>
      </div>

</div>
@endsection
