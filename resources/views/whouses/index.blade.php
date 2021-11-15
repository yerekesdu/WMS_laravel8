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
            <th scope="col">Name</th>
            <th scope="col">District code</th>
            <th scope="col">District name</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($whouses as $whouse)
        <tr>
            <td>{{$whouse->id}}</td>
            <td>{{$whouse->code}}</td>
            <td>{{$whouse->name}}</td>
            <td>{{$whouse->district->code}}</td>
            <td>{{$whouse->district->name}}</td>
            <td>{{$whouse->status->name}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        <a class="btn btn-secondary" href="{{route('whouses.create')}}">Create whouse</a>
    </div>

@endsection
