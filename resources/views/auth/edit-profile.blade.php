@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Update Profile</h2>
    <form method="POST">
        @csrf
        <div class="form-group my-2">
            <label for="name">Name</label>
            <input name="name" type="text" class="form-control" id="name" value="{{ old('name') ?? $user->name }}" autofocus>
        </div>
        <div class="form-group my-2">
            <label for="email">Email address</label>
            <input name="email" type="email" class="form-control" id="email" value="{{ old('email') ?? $user->email }}">
        </div>
        <div class="form-group my-2">
            <label for="password">Password</label>
            <input name="password" type="password" class="form-control" id="password">
        </div>
        <div class="form-group my-2">
            <label for="confirm">Confirm</label>
            <input name="confirm" type="password" class="form-control" id="confirm">
        </div>
        <div class="form-group my-2">
            <label for="address">Address</label>
            <textarea name="address" type="text" class="form-control" id="address">{{ old('address') ?? $user->address }}</textarea>
        </div>
        <div class="form-group my-2 mb-4">
            <label for="phone">Phone</label>
            <input name="phone" type="number" class="form-control" id="phone" value="{{ old('phone') ?? $user->phone }}">
        </div>
        <button name="cancel" type="submit" class="btn btn-theme">Cancel</button>
        <button type="submit" class="btn btn-primary rounded-pill">Save</button>
    </form>
</div>
@endsection
