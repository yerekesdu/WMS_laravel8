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
            <th scope="col">Type</th>
            <th scope="col">Request no</th>
            <th scope="col">District</th>
            <th scope="col">Warehouse</th>
            <th scope="col">Part no</th>
            <th scope="col">Quantity req</th>
            <th scope="col">Status</th>
            <th scope="col">Make issue</th>
        </tr>
        </thead>
        <tbody>
        @foreach($requests as $request)
        <tr>
                <td>{{$request->request_type->description}}</td>
                <td>{{$request->request_no}}</td>
                <td>{{$request->district->code}}</td>
                <td>{{$request->whouse_from}}</td>
                <td>{{$request->material_part_no}}</td>
                <td>{{$request->quantity_req}}</td>
                <td>{{$request->request_status->description}}</td>
            <form action="{{route('transactions.store')}}" method = "POST">
                @csrf
                <input type="hidden" name="request_id" value="{{$request->id}}">
                <input type="hidden" name="district_id" value="{{$request->district_id}}">
                <input type="hidden" name="whouse_from" value="{{$request->whouse_from}}">
                <input type="hidden" name="material_part_no" value="{{$request->material_part_no}}">
                <input type="hidden" name="soh" value="{{$request->quantity_req}}">
                <td><button class="btn btn-success" onclick="
                    return confirm('Хотите списать ТМЦ?')">Issue</button></td>
            </form>
        </tr>
        @endforeach
        </tbody>
    </table>

        <div>
            <a class="btn btn-secondary" href="{{route('issues.create')}}">Create issue request</a>
        </div>

@endsection
