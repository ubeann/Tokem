@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <a href="{{ route('profile.edit') }}" class="btn btn-primary rounded-pill mx-2">Edit Profile</a>
        <a href="{{ route('logout') }}" class="btn btn-danger rounded-pill mx-2">Logout</a>
    </div>
    <div class="form-group my-2">
        <label for="name">Name</label>
        <input readonly name="name" type="text" class="form-control" id="name" value="{{ old('name') ?? $user->name }}">
    </div>
    <div class="form-group my-2">
        <label for="email">Email address</label>
        <input readonly name="email" type="email" class="form-control" id="email" value="{{ old('email') ?? $user->email }}">
    </div>
    <div class="form-group my-2">
        <label for="address">Address</label>
        <textarea readonly name="address" type="text" class="form-control" id="address">{{ old('address') ?? $user->address }}</textarea>
    </div>
    <div class="form-group my-2 mb-4">
        <label for="phone">Phone</label>
        <input readonly name="phone" type="number" class="form-control" id="phone" value="{{ old('phone') ?? $user->phone }}">
    </div>

</div>
@endsection


