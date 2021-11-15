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
            <th scope="col">District from</th>
            <th scope="col">Warehouse from</th>
            <th scope="col">District to</th>
            <th scope="col">Warehouse to</th>
            <th scope="col">Part no</th>
            <th scope="col">Quantity req</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($requests as $request)
        <tr>
                <td>{{$request->request_type->description}}</td>
                <td>{{$request->request_no}}</td>
                <td>{{$request->district->code}}</td>
                <td>{{$request->whouse_from}}</td>
                <td>
                    @foreach($districts as $district)
                        @if($request->district_id_to == $district->id)
                            {{$district->code}}
                        @endif
                    @endforeach
                </td>
                <td>{{$request->whouse_to}}</td>
                <td>{{$request->material_part_no}}</td>
                <td>{{$request->quantity_req}}</td>
                <td>{{$request->request_status->description}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>

        <div>
            <a class="btn btn-secondary" href="{{route('whousetransfers.create')}}">Create warehouse transfer</a>
        </div>

@endsection
