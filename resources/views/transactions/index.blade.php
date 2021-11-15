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
                <th scope="col">Transaction type</th>
                <th scope="col">District</th>
                <th scope="col">Request</th>
                <th scope="col">Warehouse</th>
                <th scope="col">Material</th>
                <th scope="col">Quantity</th>
                <th scope="col">User</th>
            </tr>
            </thead>
            <tbody>
            @foreach($moves as $move)
                <tr>
                    <td>{{$move->tran_type->code}} - {{$move->tran_type->description}}</td>
                    <td>{{$move->district->code}}</td>
                    <td>{{$move->request->request_no}}</td>
                    <td>{{$move->whouse->code}}</td>
                    <td>{{$move->material->part_no}}</td>
                    <td>{{$move->quantity}}</td>
                    <td>{{$move->user->name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

@endsection
