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
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($districts as $district)
        <tr>
            <td>{{$district->id}}</td>
            <td>{{$district->code}}</td>
            <td>{{$district->name}}</td>
            <td>{{$district->status->name}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        <a class="btn btn-secondary" href="{{route('districts.create')}}">Create district</a>
    </div>

@endsection
