@extends('layouts.master')

@section('title', 'Items')

@section('content')

<div class="mt-4 p-5 bg-black text-white rounded">
    <h1>Add New Item</h1>
</div>

@if ($errors->any())
    <div class="alert alert-danger mt-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="row my-5">
        <div class="col-12 px-5">
            <form action="{{ route('items.update', $item) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="item_id" class="form-label">Item ID</label>
                    <input type="text" class="form-control" id="item_id" name="item_id" readonly value="{{ old('item_id', $item->id) }}">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $item->nama) }}">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga', $item->harga) }}" min="1" step=".01">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" value="{{ old('stok', $item->stok) }}">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Add Item</button>
            </form>
        </div>
    </div>

@endsection
