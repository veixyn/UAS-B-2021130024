@extends('layouts.master')

@section('title', 'Items')

@section('content')

    <article class="blog-post my-4">
        <h1 class="display-5 fw-bold">{{ $item->id }}</h1>
        <p>{{ $item->nama }}</p>
        <p>{{ $item->harga }}</p>
        <p>{{ $item->stok }}</p>
    </article>

@endsection
