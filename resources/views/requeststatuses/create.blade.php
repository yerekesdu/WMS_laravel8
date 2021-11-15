@extends('layouts.layout')

@section('content')

    @if($errors->any())
        @foreach($errors->all() as $err)
            <div class="alert alert-danger">
                {{$err}}
            </div>
        @endforeach
    @endif

    <form action="{{route('requeststatuses.store')}}" method="POST">
        @csrf
        <div class="col-4 mt-2 ml-2">
            <span>Code</span>
            <input type="text" class="form-control col-sm" aria-label="Sizing example input"
                   aria-describedby="inputGroup-sizing-default" name="code">
        </div>

        <div class="col-4 mt-2 ml-2">
            <span>Description</span>
            <input type="text" class="form-control col-sm" aria-label="Sizing example input"
                   aria-describedby="inputGroup-sizing-default" name="description">
        </div>

        <div class="col-4 mt-2 ml-2">
            <button class="btn btn-success">Save</button>
        </div>
    </form>

@endsection
