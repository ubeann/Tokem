@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <img src="https://www.freepnglogos.com/uploads/notebook-png/download-laptop-notebook-png-image-png-image-pngimg-2.png" class="img-thumbnail img-fluid" alt="">
        </div>
        <div class="col-6">
            <h2>Nama Barang</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, iste. Perferendis amet officiis in recusandae sint quis corrupti quas omnis doloremque itaque cupiditate, et maxime soluta velit a quidem aperiam?</p>
            <p>Kategori : ayaya</p>
            <p>Stok : 100</p>
            {{-- KALO ADMIN GADA TOMBOL ADD TO CART --}}
            <form class="input-group justify-content-end">
                <div class="form-outline">
                  <input placeholder="Quantity" id="form1" class="form-control" />
                </div>
                <button type="submit" class="btn btn-primary">
                  <i class="bi bi-cart"></i>
                  Add to cart
                </button>
            </form>
        </div>
      </div>

</div>
@endsection
