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
            <th scope="col">Part no</th>
            <th scope="col">Name</th>
            <th scope="col">Unit of issue</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($materials as $material)
        <tr>
            <td>{{$material->id}}</td>
            <td>{{$material->part_no}}</td>
            <td>{{$material->name}}</td>
            <td>{{$material->unit_of_issue->code}}</td>
            <td>{{$material->status->name}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        <a class="btn btn-secondary" href="{{route('materials.create')}}">Create material</a>
    </div>

@endsection
