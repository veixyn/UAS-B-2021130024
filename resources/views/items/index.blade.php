@extends('layouts.master')

@section('title', 'Items List')

@section('content')

    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>All Items</h1>
        <a href="{{ route('items.create') }}" class="btn btn-primary btn-sm">Add New Item</a>
    </div>

    @if (session()->has('success'))
    <div
        class="alert alert-primary alert-dismissible fade show mt-4"
        role="alert"
    >
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        ></button>
        <strong>{{ session()->get('success') }}</strong>
    </div>
    @endif




    <div class="container mt-5">
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">Item ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Edit / Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <tr>
                        <th scope="row"><a href="{{route('items.show', $item)}}">{{ $item->id }}</th>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->harga }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>
                            <a href="{{ route('items.edit', $item) }}" class="btn btn-primary btn-sm">
                                Edit
                            </a>
                            <form action="{{ route('items.destroy', $item) }}" method="POST"
                                class="d-inline-block">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No articles found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {!! $items->links() !!}
        </div>
    </div>

    <script>
        var alertList = document.querySelectorAll(".alert");
        alertList.forEach(function (alert) {
            new bootstrap.Alert(alert);
        });
    </script>

@endsection
