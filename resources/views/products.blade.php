@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="{{ asset('assets/css/products.css') }}">
@endsection

@section('content')
<div class="container-fluid bg-transparent ">
    <form class="input-group justify-content-end">
        <div class="form-outline">
          <input placeholder="Search" type="search" id="form1" class="form-control" />
        </div>
        <button type="button" class="btn btn-primary">
          <i class="bi bi-search"></i>
        </button>
    </form>
</div>
<div class="container-fluid bg-trasparent my-4 p-3" style="position: relative;">
    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
        {{-- PRODUK NORMAL --}}
        <div class="col">
            <div class="card h-100 shadow-sm"> <img src="https://www.freepnglogos.com/uploads/notebook-png/download-laptop-notebook-png-image-png-image-pngimg-2.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Produk default</h5>
                    <div class="clearfix mb-3"> <span class="float-start badge rounded-pill bg-success">Rp 250.000,00</span> <span class="float-end"><p href="#" class="text-muted">Kategorinya</p></span> </div>
                    <div class="text-center d-grid">
                        <a href="#" class="btn btn-primary"><i class="bi bi-bag me-2"></i>Add to cart</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- PRODUK STOK KOSONG --}}
        <div class="col">
            <div class="card h-100 shadow-sm"> <img src="https://www.freepnglogos.com/uploads/notebook-png/notebook-laptop-png-images-you-can-download-mashtrelo-14.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Produk habis</h5>
                    <div class="clearfix mb-3"> <span class="float-start badge rounded-pill bg-success">Rp 250.000,00</span> <span class="float-end"><p href="#" class="text-muted">Kategorinya</p></span> </div>
                    <div class="text-center d-grid">
                        <a href="#" class="btn btn-gray disabled" aria-disabled="true">Product unavaible</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- PRODUK ADMIN --}}
        <div class="col">
            <div class="card h-100 shadow-sm"> <img src="https://www.freepnglogos.com/uploads/notebook-png/download-laptop-notebook-png-image-png-image-pngimg-2.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Produk di admin</h5>
                    <div class="clearfix mb-3"> <span class="float-start badge rounded-pill bg-success">Rp 250.000,00</span> <span class="float-end"><p href="#" class="text-muted">Kategorinya</p></span> </div>
                    <div class="row">
                        <div class="col text-center d-grid">
                            <a href="#" class="btn btn-secondary"><i class="bi bi-pen me-2"></i>Edit</a>
                        </div>
                        <div class="col text-center d-grid">
                            <a href="#" class="btn btn-danger"><i class="bi bi-trash me-2"></i>Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<nav class="container-fluid">
    <ul class="pagination justify-content-center">
      <li class="page-item"><a class="page-link" href="#">Previous</a></li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
  </nav>
@endsection
