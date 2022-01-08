@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="{{ asset('assets/css/products.css') }}">
@endsection

@section('content')
<div class="container-fluid bg-transparent ">
    <form class="input-group justify-content-end">
        @if (Auth::check() and Auth::user()->role == 'admin')
            {{-- ADMIN ONLY --}}
            <a href="{{route('admin.add_product')}}" class="btn btn-success me-4"><i class="bi bi-plus me-2"></i>Add Product</a>
            {{-- END OF ADMIN ONLY --}}
        @endif
        <div class="form-outline">
          <input name="search" placeholder="Search" type="search" id="form1" class="form-control" value="{{$search}}"/>
        </div>
        <button type="submit" class="btn btn-primary">
          <i class="bi bi-search"></i>
        </button>
    </form>
</div>
<div class="container-fluid bg-trasparent my-4 p-3" style="position: relative;">

    {{-- Show search --}}
    @if (isset($search) and $search != '')
        <div class="container-fluid bg-transparent mb-2">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-left">Search results for: <b>{{ $search }}</b></h4>
                </div>
            </div>
        </div>
    @endif

    @if ($products->count() == 0)
        <div class="container-fluid bg-transparent">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Oops!</h4>
                        <p>No product found.</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
        @foreach ($products as $product)
            <div class="col card h-100 shadow-sm m-2">
                <img src="{{$product->image}}" class="card-img-top" alt="{{$product->name}}">
                <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <div class="clearfix mb-3"> <span class="float-start badge rounded-pill bg-success">{{"Rp " . number_format($product->price,2,',','.')}}</span> <span class="float-end"><p href="#" class="text-muted">{{$product->category->name}}</p></span> </div>
                    <div class="row">
                        @if (Auth::check() and Auth::user()->role == 'admin')
                            <div class="col text-center d-grid">
                                <a href="{{route('admin.edit_product', $product->id)}}" class="btn btn-secondary"><i class="bi bi-pen me-2"></i>Edit</a>
                            </div>
                            <div class="col text-center d-grid">
                                <a href="{{route('admin.delete_product', $product->id)}}" class="btn btn-danger"><i class="bi bi-trash me-2"></i>Delete</a>
                            </div>
                        @endif
                        <div class="text-center d-grid mt-2">
                            @if ($product->stock > 0)
                                <a href="#" class="btn btn-primary"><i class="bi bi-bag me-2"></i>Add to cart</a>
                            @else
                                <a href="#" class="btn btn-gray disabled" aria-disabled="true">Product unavaible</a>
                            @endif
                            <a href="{{ route('detail', $product->id) }}" class="btn btn-info mt-2"><i class="bi bi-list me-2"></i>Show detail</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@if ($products->hasPages())
    <nav class="container-fluid">
        <ul class="pagination justify-content-center">
            {{-- Previous Page Link --}}
            @if ($products->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $products->previousPageUrl() }}" rel="prev">Previous</a>
                </li>
            @endif
                
            {{-- Pagination Elements --}}
            @foreach ($products as $product)
                {{-- "Three Dots" Separator --}}
                @if (is_string($product))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $product }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($product))
                    @foreach ($product as $page => $url)
                        @if ($page == $products->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($products->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $products->nextPageUrl() }}" rel="next">Next</a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Next</a>
                </li>
            @endif
        </ul>
    </nav>
@endif
@endsection
