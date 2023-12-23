@extends('layouts.master')

@section('title', 'Order List')

@section('content')

<div class="mt-4 p-5 bg-black text-white rounded">
    <h1>All Orders</h1>
    <a href="{{ route('createOrder') }}" class="btn btn-primary btn-sm">Add New Order</a>
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

<div class="container mt-2">
    <table class="table table-bordered mb-5">
        <thead>
            <tr class="table-success">
                <th scope="col">Order ID</th>
                <th scope="col">Status</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
                <tr>
                    <td><a href="{{route('orderDetail', $order)}}">{{$order->id}}</td>
                    <td>{{$order->status}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->updated_at}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No orders found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {!! $orders->links() !!}
    </div>
</div>

<script>
    var alertList = document.querySelectorAll(".alert");
    alertList.forEach(function (alert) {
        new bootstrap.Alert(alert);
    });
</script>

@endsection
