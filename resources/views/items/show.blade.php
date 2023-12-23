@extends('layouts.master')

@section('title', $item->nama)

@section('content')

    <article class="blog-post my-4">
        <h1 class="display-5 fw-bold">{{ $item->nama }}</h1>
        <p><b>Item ID</b> : {{ $item->id }}</p>
        <p><b>Harga</b> : Rp. {{ number_format($item->harga) }}</p>
        <p><b>Sisa Stok</b> : {{ $item->stok }}</p>
    </article>

@endsection
