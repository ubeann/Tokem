@extends('layouts.app')

@section('content')
<div class="container mb-5">
    <h2>Edit Product</h2>
    <div class="row">
        <div class="col">
            <img src="{{$product->image}}" id="photo" class="img-thumbnail img-fluid" alt="{{$product->name}}" width="600">
        </div>
        <div class="col-8">
            <form method="POST", enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Product name" value="{{ old('name') ?? $product->name }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Product Description</label>
                    <textarea name="description" type="text" class="form-control" id="desc" placeholder="Product Description">{{ old('description') ?? $product->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input name="price" type="number" class="form-control" id="price" placeholder="Price in IDR" value="{{ old('price') ?? $product->price}}">
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Product Stock</label>
                    <input name="stock" type="number" class="form-control" id="stock" placeholder="Stock" value="{{ old('stock') ?? $product->stock }}">
                </div>
                <div class="mb-3">
                    <label for="img" class="form-label">Product Image</label><br>
                    <input name="image" onchange="document.getElementById('photo').src = window.URL.createObjectURL(this.files[0])" class="form-control" type="file" id="img" accept="image/*">
                </div>
                <div class="mb-3">
                    <label for="cat" class="form-label">Product Category</label>
                    <select name="category" class="form-select" id="cat" disabled>
                        <option selected disabled>{{$product->category->name}}</option>
                    </select>
                </div>
                <button name="cancel" type="submit" class="btn btn-white">Cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
