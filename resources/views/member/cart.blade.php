@extends('layouts.app')

@section('content')
<form class="container bg-trasparent my-4 p-3" style="position: relative;">
    <h2>Please confirm your order</h2>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Product</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th class="text-end" scope="col">Sub Total</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Rp 12.000,00</td>
            <td><input name="phone" type="number" value="" class="form-control form-control-sm""></td>
            <td class="text-end">Rp 60.000,00</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Rp 12.000,00</td>
            <td><input name="phone" type="number" value="" class="form-control form-control-sm""></td>
            <td class="text-end">Rp 60.000,00</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Jacob</td>
            <td>Rp 12.000,00</td>
            <td><input name="phone" type="number" value="" class="form-control form-control-sm""></td>
            <td class="text-end">Rp 60.000,00</td>
        </tr>
        <td><input name="phone" type="number" value="" class="form-control form-control-sm""></td>
        <tr>
            <td colspan="5" class="text-end"><h5>Rp 350.000,00</h5></td>
        </tr>
        </tbody>
    </table>
    <a href="{{ route('member.checkout') }}" type="submit" class="btn btn-primary">Checkout</a>
</form>

<style>
    .form-control {
        max-width: 55px;
    }
</style>
@endsection
