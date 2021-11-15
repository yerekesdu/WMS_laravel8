<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Whouse;
use App\Models\Balance;
use App\Models\Transaction;
use App\Models\Order;

class ReceiptController extends Controller
{
    public function index(){
        $requests = \App\Models\Request::where('request_type_id', '3')->
                    where('request_status_id',2)->orWhere(function($query)
        {
            $query->where('request_type_id', '1')
                ->where('request_status_id', '4');
        })->get();

        return view('receipts.index', compact('requests'));
    }

    public function create()
    {
        $orders = Order::all();
        return view('receipts.create', compact('orders'));
    }

    public function store(Request $request){
        $request->validate([
            'request_id'=>['required', 'max:255'],
            'district_id'=>['required', 'max:255'],
            'whouse_to'=>['required', 'max:10'],
            'material_part_no'=>['required', 'max:25', 'exists:materials,part_no'],
            'soh'=>['required', 'max:25'],
        ]);

        $whouse_to = $request->input('whouse_to');
        $whouse = Whouse::where('code', $whouse_to)->firstOrFail();

        $part_no = $request->input('material_part_no');
        $material = Material::where('part_no', $part_no)->firstOrFail();

        $district_id = $request->input('district_id');
        $soh = $request->input('soh');
        $request_id = $request->input('request_id');
        $theRequest = \App\Models\Request::where('id', $request_id)->first();

        if($theRequest->request_type_id == 1 ) {
            Transaction::create([
                'tran_type_id' => 4,
                'district_id' => $district_id,
                'request_id' => $request_id,
                'whouse_id' => $whouse->id,
                'material_id' => $material->id,
                'quantity' => $soh,
                'user_id' => auth()->user()->id,
            ]);

            $affectedRequest = \App\Models\Request::where('id', $request_id)
                ->update(array('request_status_id' => 1));
        }
        else if($theRequest->request_type_id == 3 ){
            Transaction::create([
                'tran_type_id' => 2,
                'district_id' => $district_id,
                'request_id' => $request_id,
                'whouse_id' => $whouse->id,
                'material_id' => $material->id,
                'quantity' => $soh,
                'user_id' => auth()->user()->id,
            ]);

            $affectedRequest1 = \App\Models\Request::where('id', $request_id)
                ->update(array('request_status_id' => 1));
        }

        $exists = NULL;
        $exists = Balance::where('district_id', $district_id)->where('whouse_id', $whouse->id)->
        where('material_id', $material->id)->first();

        if($exists){
            $current_soh = $exists->soh;
            $affectedRows = Balance::where('district_id', $district_id)->where('whouse_id', $whouse->id)->
            where('material_id', $material->id)->update(array('soh' => $current_soh + $soh));

                $affectedRequest = \App\Models\Request::where('id', $request_id)
                    ->update(array('request_status_id' => 1));

            return redirect()->route('receipts.index')->with('message', 'You updated successfully');
        }
        else {
            Balance::create([
                'district_id' => $district_id,
                'whouse_id' => $whouse->id,
                'material_id' => $material->id,
                'soh' => $soh,
            ]);

            $affectedRequest = \App\Models\Request::where('id', $request_id)
                ->update(array('request_status_id' => 1));

            return redirect()->route('receipts.index')->with('message', 'You created successfully');
        }
    }
}
