@extends('layouts.master')

@section('title', 'Order')

@section('content')

<div class="mb-5 mt-5">
    <form action="{{}}" method="post">
        <div class="mb-3">
            <label for="" class="form-label">Status Pembayaran</label>
            <select class="form-select form-select-lg" name="status" id="status">
                <option selected>Select one</option>
                <option value="selesai">Selesai</option>
                <option value="belum">Menunggu Pembayaran</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Item</label>
            <select
                multiple
                class="form-select form-select-lg"
                name="item"
                id="item"
            >
                <option selected>Select one</option>
                <option value="">New Delhi</option>
                <option value="">Istanbul</option>
                <option value="">Jakarta</option>
            </select>
        </div>

    </form>
</div>

@endsection
