@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <h2>Category List</h2>
        <p class="badge rounded-pill bg-light text-dark">Primary</p>
        <p class="badge rounded-pill bg-light text-dark">Secondary</p>
        <p class="badge rounded-pill bg-light text-dark">Success</p>
        <p class="badge rounded-pill bg-light text-dark">Danger</p>
        <p class="badge rounded-pill bg-light text-dark">Warning</p>
        <p class="badge rounded-pill bg-light text-dark">Info</p>
        <p class="badge rounded-pill bg-light text-dark">Light</p>
        <p class="badge rounded-pill bg-light text-dark">Dark</p>
    </div>
    <h2 class="mt-4">Add Category</h2>
    <form action="">
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="name" placeholder="Category name">
        </div>
        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
</div>
@endsection
