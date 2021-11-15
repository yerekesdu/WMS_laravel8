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
            <th scope="col">Code</th>
            <th scope="col">Description</th>
        </tr>
        </thead>
        <tbody>
        @foreach($trantypes as $trantype)
        <tr>
            <td>{{$trantype->id}}</td>
            <td>{{$trantype->code}}</td>
            <td>{{$trantype->description}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        <a class="btn btn-secondary" href="{{route('trantypes.create')}}">Create transaction type</a>
    </div>

@endsection
