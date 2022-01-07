@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Product</h2>
    <form method="POST", enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Product name" value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Product Description</label>
            <textarea name="description" type="text" class="form-control" id="desc" placeholder="Product Description">{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input name="price" type="number" class="form-control" id="price" placeholder="Price in IDR" value="{{ old('price') }}">
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Product Stock</label>
            <input name="stock" type="number" class="form-control" id="stock" placeholder="Stock" value="{{ old('stock') }}">
        </div>
        <div class="mb-3">
            <label for="img" class="form-label">Product Image</label>
            <input name="image" class="form-control" type="file" id="img" accept="image/*">
        </div>
        <div class="mb-3">
            <label for="cat" class="form-label">Product Category</label>
            <select name="category" class="form-select" id="cat">
                <option selected disabled>Choose...</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if (old('category') == $category->id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button name="cancel" type="submit" class="btn btn-white">Cancel</button>
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>
@endsection
