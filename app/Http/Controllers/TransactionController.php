<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Whouse;
use App\Models\Material;
use App\Models\Balance;

class TransactionController extends Controller
{

    public function index()
    {
        $moves = Transaction::all();
        return view('transactions.index', compact('moves'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'request_id'=>['required', 'max:255'],
            'district_id'=>['required', 'max:255'],
            'whouse_from'=>['required', 'max:10', 'exists:whouses,code'],
            'material_part_no'=>['required', 'max:25', 'exists:materials,part_no'],
            'soh'=>['required', 'max:25'],
        ]);

        $whouse_from = $request->input('whouse_from');
        $whouse = Whouse::where('code', $whouse_from)->firstOrFail();

        $part_no = $request->input('material_part_no');
        $material = Material::where('part_no', $part_no)->firstOrFail();

        $district_id = $request->input('district_id');
        $soh = $request->input('soh');
        $request_id = $request->input('request_id');

        $exists = NULL;
        $exists = Balance::where('district_id', $district_id)->where('whouse_id', $whouse->id)->
        where('material_id', $material->id)->first();

        if($exists == NULL){
            return redirect()->route('issues.index')->with('message', 'ТМЦ нет на складе, не возможно списать');
        }

        else if($exists && $exists->soh < $soh){
            return redirect()->route('issues.index')->with('message', 'Количество ТМЦ на остатке не достаточно для списания, не возможно списать');
        }

        else{

            $current_soh = $exists->soh;
            $affectedRows = Balance::where('district_id', $district_id)->where('whouse_id', $whouse->id)->
            where('material_id', $material->id)->update(array('soh' => $current_soh - $soh));

            $theRequest = \App\Models\Request::where('id', $request_id)->first();

            if($theRequest->request_type_id == 1 ){

                Transaction::create([
                    'tran_type_id' => 3,
                    'district_id' => $district_id,
                    'request_id' => $request_id,
                    'whouse_id' => $whouse->id,
                    'material_id' => $material->id,
                    'quantity' => $soh,
                    'user_id' => auth()->user()->id,
                ]);

               $affectedRequest = \App\Models\Request::where('id', $request_id)
                    ->update(array('request_status_id' => 4));
            }
            else if($theRequest->request_type_id == 2 ){
                Transaction::create([
                    'tran_type_id' => 1,
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

            return redirect()->route('issues.index')->with('message', 'Вы успешно списали ТМЦ');
        }

    }

    public function show(Transaction $transaction)
    {
        //
    }

    public function edit(Transaction $transaction)
    {
        //
    }

    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    public function destroy(Transaction $transaction)
    {
        //
    }
}
