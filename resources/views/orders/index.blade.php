@extends('layouts.layout')

@section('content')

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Order no</th>
            <th scope="col">District</th>
            <th scope="col">Material</th>
            <th scope="col">Price</th>
            <th scope="col">Qty</th>
            <th scope="col">Created by</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->order_no}}</td>
            <td>{{$order->district->code}}</td>
            <td>{{$order->material_part_no}}</td>
            <td>{{$order->price}}</td>
            <td>{{$order->qty}}</td>
            <td>{{$order->user->name}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        <a class="btn btn-secondary" href="{{route('orders.create')}}">Create order</a>
    </div>

@endsection
