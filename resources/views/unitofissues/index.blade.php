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
            <th scope="col">Created at</th>
        </tr>
        </thead>
        <tbody>
        @foreach($unitOfIssues as $unitOfIssue)
        <tr>
            <td>{{$unitOfIssue->id}}</td>
            <td>{{$unitOfIssue->code}}</td>
            <td>{{$unitOfIssue->description}}</td>
            <td>{{$unitOfIssue->created_at}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        <a class="btn btn-secondary" href="{{route('unitofissues.create')}}">Create unit of issue</a>
    </div>

@endsection
