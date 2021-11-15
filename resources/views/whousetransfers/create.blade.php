@extends('layouts.layout')

@section('content')

    @if($errors->any())
        @foreach($errors->all() as $err)
            <div class="alert alert-danger">
                {{$err}}
            </div>
        @endforeach
    @endif

    <form action="{{route('whousetransfers.store')}}" method="POST">
        @csrf

        <div class="col-4 mt-2 ml-2">
            <span>District from</span>
            <select class="form-control" name = "district_id">
                @foreach($districts as $district)
                    <option value="{{$district->id}}">{{$district->code}} - {{$district->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-4 mt-2 ml-2">
            <span>Warehouse from</span>
            <input type="text" class="form-control col-sm" aria-label="Sizing example input"
                   aria-describedby="inputGroup-sizing-default" name="whouse_code_from">
        </div>

        <div class="col-4 mt-2 ml-2">
            <span>District to</span>
            <select class="form-control" name = "district_id_to">
                @foreach($districts as $district)
                    <option value="{{$district->id}}">{{$district->code}} - {{$district->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-4 mt-2 ml-2">
            <span>Warehouse to</span>
            <input type="text" class="form-control col-sm" aria-label="Sizing example input"
                   aria-describedby="inputGroup-sizing-default" name="whouse_code_to">
        </div>

        <div class="col-4 mt-2 ml-2">
            <span>Material</span>
            <input type="text" class="form-control col-sm" aria-label="Sizing example input"
                   aria-describedby="inputGroup-sizing-default" name="material_part_no">
        </div>

        <div class="col-4 mt-2 ml-2">
            <span>Quantity</span>
            <input type="text" class="form-control col-sm" aria-label="Sizing example input"
                   aria-describedby="inputGroup-sizing-default" name="qty">
        </div>

        <div class="col-4 mt-2 ml-2">
            <button class="btn btn-success">Save</button>
        </div>
    </form>

@endsection
