@extends('layouts.layout')

@section('content')

    @if($errors->any())
        @foreach($errors->all() as $err)
            <div class="alert alert-danger">
                {{$err}}
            </div>
        @endforeach
    @endif

    <form action="{{route('whouses.store')}}" method="POST">
        @csrf
        <div class="col-4 mt-2 ml-2">
            <span>Code</span>
            <input type="text" class="form-control col-sm" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="code">
        </div>

        <div class="col-4 mt-2 ml-2">
            <span>Name</span>
            <input type="text" class="form-control col-sm" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="name">
        </div>

        <div class="col-4 mt-2 ml-2">
            <span>District</span>
            <select class="form-control" name = "district_id">
                @foreach($districts as $district)
                    <option value="{{$district->id}}">{{$district->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-4 mt-2 ml-2">
            <span>Status</span>
            <select class="form-control" name = "status_id">
                @foreach($statuses as $status)
                    <option value="{{$status->id}}">{{$status->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-4 mt-2 ml-2">
            <button class="btn btn-success">Save</button>
        </div>
    </form>

@endsection
