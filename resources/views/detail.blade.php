@extends('layouts.master')

@section('title', 'Order Detail')

@section('content')

<div class="align-items-center m-4 w3-animate-bottom">
    <div class="card mt-3 shadow">
        <h5 class="card-header p-2.5">Order Detail</h5>
        <div class="card-body">
            <p class="card-text"><b>Order ID : </b> {{ $order->id }}</p>
            <p class="card-text"><b>Status : </b> {{ $order->status }}</p>
            <p class="card-text"><b>Tanggal Order : </b> {{ $order->created_at }}</p>
        </div>
    </div>
</div>

<h4 class="m-4 p-2 w3-animate-bottom">List Order :</h4>

    <div class="row mt-4 mb-4 align-items-center">
        @foreach ($orderDetails as $detail)
        <x-detail-box row1="Nama Item : {{$detail->nama}}"
                    row2="Quantity : {{$detail->quantity}}"
                    row3="Subtotal : Rp. {{number_format($detail->harga * $detail->quantity)}}"></x-detail-box>
        @endforeach
        <hr class="w3-animate-bottom">
    </div>

<h5 class="m-4 w3-animate-bottom">Total Harga (PPN 11%) : <b>Rp. {{ number_format($total) }}</b></h5>

@endsection
