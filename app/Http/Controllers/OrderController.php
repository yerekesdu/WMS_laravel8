<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Material;
use function GuzzleHttp\Promise\all;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $districts = District::all();
        return view('orders.create', compact('districts'));
    }

    public function store(Request $request)
    {
        $orderMaxId = Order::max('id');
        $orderNo =  "ORD".str_pad($orderMaxId+1, 7, "0", STR_PAD_LEFT);

        $request->validate([
            'district_id'=>['required', 'max:255'],
            'material_part_no'=>['required', 'max:25', 'exists:materials,part_no'],
            'price'=>['required', 'max:25'],
            'qty'=>['required', 'max:25'],
            'user_id'=>['required', 'max:25'],
        ]);

        Order::create([
            'order_no' => $orderNo,
            'district_id' => $request->input('district_id'),
            'material_part_no' => $request->input('material_part_no'),
            'price' => $request->input('price'),
            'qty' => $request->input('qty'),
            'user_id' => $request->input('user_id'),
        ]);
        return redirect()->route('orders.index')->with('message', 'You created successfully');
    }

    public function show(Order $order)
    {
        //
    }

    public function edit(Order $order)
    {
        //
    }

    public function update(Request $request, Order $order)
    {
        //
    }

    public function destroy(Order $order)
    {
        //
    }
}
