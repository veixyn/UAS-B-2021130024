@extends('layouts.master')

@section('title', 'Main Menu')

@section('content')

<div class="card-group">
    <div class="card">
        <img
            class="card-img-top"
        />
        <div class="card-body">
            <h4 class="card-title"><b>Items List</b></h4>
            <p class="card-text">There are currently <b>{{$countItem}}</b> items for sale.</p>
            <a href="{{route('items.index')}}">Click here to view Items List</a>
        </div>
    </div>
    <div class="card">
        <img
            class="card-img-top"
        />
        <div class="card-body">
            <h4 class="card-title"><b>Orders List</b></h4>
            <p class="card-text">There are currently <b>{{$countOrder}}</b> orders listed.</p>
            <p class="card-text"><b>{{$countMP}}</b> of them are awating for payment.</p>
            <p class="card-text"><b>{{$countSelesai}}</b> of them are completed.</p>
            <a href="{{route('orderList')}}">Click here to view Orders List</a>
        </div>
    </div>
</div>



@endsection
