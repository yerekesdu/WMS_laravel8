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
            <th scope="col">District</th>
            <th scope="col">Warehouse</th>
            <th scope="col">Material</th>
            <th scope="col">Quantity</th>
        </tr>
        </thead>
        <tbody>
        @foreach($balances as $balance)
        <tr>
            <td>{{$balance->district->code}}</td>
            <td>{{$balance->whouse->code}}</td>
            <td>{{$balance->material->part_no}}</td>
            <td>{{$balance->soh}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>

@endsection
