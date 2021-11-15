@extends('layouts.layout')

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">District</th>
            <th scope="col">Order no</th>
            <th scope="col">Material</th>
            <th scope="col">Qty</th>
            <th scope="col">Create receipt request</th>
        </tr>
        </thead>
        <tbody>

        @foreach($orders as $order)
            <tr>
                <td>{{$order->district->code}}</td>
                <td>{{$order->order_no}}</td>
                <td>{{$order->material_part_no}}</td>
                <td>{{$order->qty}}</td>
                <td> <button class="btn btn-secondary"
                             data-bs-toggle="modal"  data-bs-target="#exampleModal{{$order->id}}">Create</button> </td>
            </tr>

            <div class="modal fade" id="exampleModal{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Номер заказа - {{$order->order_no}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{route('requests.store')}}" method = "POST">
                            @csrf
                            <div class="modal-body">
                                <span>Warehouse code</span>
                                <input type="hidden" name="request_type_id" value="3">
                                <input type="hidden" name="district_id" value="{{$order->district->id}}">
                                <input type="hidden" name="material_part_no" value="{{$order->material_part_no}}">
                                <input type="hidden" name="quantity_req" value="{{$order->qty}}">
                                <input type="text" class="form-control col-sm" aria-label="Sizing example input"
                                       aria-describedby="inputGroup-sizing-default" name="whouse_code" style="width: 150px">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>

                                <button type="submit" class="btn btn-success">Создать приходную заявку</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        @endforeach
        </tbody>
    </table>

@endsection
