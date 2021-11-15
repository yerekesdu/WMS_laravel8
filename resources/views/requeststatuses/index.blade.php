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
        @foreach($requestStatuses as $requestStatus)
        <tr>
            <td>{{$requestStatus->id}}</td>
            <td>{{$requestStatus->code}}</td>
            <td>{{$requestStatus->description}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        <a class="btn btn-secondary" href="{{route('requeststatuses.create')}}">Create order</a>
    </div>

@endsection
