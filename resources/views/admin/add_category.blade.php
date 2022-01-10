@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <h2>Category List</h2>
        <div class="d-flex">
            @foreach ($category as $item)
                <h4 class="m-1"><span class="badge rounded-pill bg-light text-dark">{{$item->name}}</span></h4>
            @endforeach
        </div>
    </div>
    <h2 class="mt-4">Add Category</h2>
    <form method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Category name" value="{{ old('name') }}">
        </div>
        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
</div>
@endsection
