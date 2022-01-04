@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Product</h2>
    <form action="">
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="name" placeholder="Product name">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Product Description</label>
            <textarea type="text" class="form-control" id="name" placeholder="Product Description"></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="email" class="form-control" id="price" placeholder="Price in IDR">
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Product Stock</label>
            <input type="email" class="form-control" id="stock" placeholder="Stock">
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Product Image</label>
            <input class="form-control" type="file" id="formFile" accept="image/*">
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Product Category</label>
            <select class="form-select" id="inputGroupSelect01">
                <option selected disabled>Choose...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
        </div>
        <button type="submit" class="btn btn-white">Cancel</button>
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>
@endsection
