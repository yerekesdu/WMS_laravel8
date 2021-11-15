<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;
use App\Models\RequestType;
use App\Models\Order;

class RequestController extends Controller
{

    public function index()
    {
        $requests = \App\Models\Request::all();
        $request_types = RequestType::all();
        $districts = District::all();

        return view('requests.index', compact('requests', 'request_types', 'districts'));
    }

    public function create(Request $request)
    {
        if($request->input('request_type') == 3){
            $orders = Order::all();
            return view('requests.createRC', compact('orders'));
        }
        else if($request->input('request_type') == 2){
            return view('requests.createIS');
        }
        else if($request->input('request_type') == 1){
            return view('requests.createWT');
        }
        else return redirect()->route('requests.index')->with('message', 'Вам нужно выбрать тип заявки');
    }

    public function store(Request $request)
    {
        $requestMaxId = \App\Models\Request::max('id');
        $requestNo =  "RC".str_pad($requestMaxId+1, 7, "0", STR_PAD_LEFT);

        $request->validate([
            'request_type_id'=>['required', 'max:10'],
            'district_id'=>['required', 'max:255'],
            'material_part_no'=>['required', 'max:25', 'exists:materials,part_no'],
            'quantity_req'=>['required', 'max:25'],
            'whouse_code'=>['required', 'max:25'],
        ]);
        \App\Models\Request::create([
            'request_no' => $requestNo,
            'request_type_id' => $request->input('request_type_id'),
            'district_id' => $request->input('district_id'),
            'material_part_no' => $request->input('material_part_no'),
            'quantity_req' => $request->input('quantity_req'),
            'whouse_to' => $request->input('whouse_code'),
            'request_status_id' => 2,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('receipts.index')->with('message', 'You created successfully');
    }

    public function show(Request $request)
    {
        //
    }

    public function edit(Request $request)
    {
        //
    }

    public function update(Request $request, \App\Models\Request $request1)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }
}
