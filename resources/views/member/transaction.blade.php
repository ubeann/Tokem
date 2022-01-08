@extends('layouts.app')

@section('content')
<div class="container bg-trasparent my-4 p-3" style="position: relative;">
    <h2>My Transaction</h2>
    @if ($transactions->count() < 1)
        <div class="alert alert-danger alert-dismissible fade show container mt-4" role="alert">
            You have no transaction yet
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @foreach ($transactions as $transaction)
        <div class="my-4">
            <h4>{{ $transaction->created_at->format('l, d M Y H:i') }}</h4>
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
                    @foreach($transaction->cart as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->product->name}}</td>
                            <td>{{"Rp " . number_format($item->product->price,2,',','.')}}</td>
                            <td>{{$item->quantity}}</td>
                            <td class="text-end">{{"Rp " . number_format($item->sub_total,2,',','.')}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" class="text-right">Total</td>
                        <td class="text-end">{{"Rp " . number_format($transaction->cart->sum('sub_total'),2,',','.')}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endforeach
    @if ($transactions->hasPages())
        <nav class="container-fluid">
            <ul class="pagination justify-content-center">
                {{-- Previous Page Link --}}
                @if ($transactions->onFirstPage())
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $transactions->previousPageUrl() }}" rel="prev">Previous</a>
                    </li>
                @endif
                    
                {{-- Pagination Elements --}}
                @foreach ($transactions as $transaction)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($transaction))
                        <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $transaction }}</span></li>
                    @endif
    
                    {{-- Array Of Links --}}
                    @if (is_array($transaction))
                        @foreach ($transaction as $page => $url)
                            @if ($page == $transactions->currentPage())
                                <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
    
                {{-- Next Page Link --}}
                @if ($transactions->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $transactions->nextPageUrl() }}" rel="next">Next</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Next</a>
                    </li>
                @endif
            </ul>
        </nav>
    @endif
</div>
@endsection
