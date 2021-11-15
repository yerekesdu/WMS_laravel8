<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;

class WhouseTransferController extends Controller
{

    public function index()
    {
        $requests = \App\Models\Request::where('request_type_id', '1')->get();
//        dd($requests);
        $districts = District::all();

        return view('whousetransfers.index', compact('requests', 'districts'));
    }

    public function create()
    {
        $districts = District::all();
        return view('whousetransfers.create', compact('districts'));
    }

    public function store(Request $request)
    {
        $requestMaxId = \App\Models\Request::max('id');
        $requestNo =  "RC".str_pad($requestMaxId+1, 7, "0", STR_PAD_LEFT);

        $request->validate([
            'district_id'=>['required', 'max:255'],
            'whouse_code_from'=>['required', 'max:25','exists:whouses,code'],
            'district_id_to'=>['required', 'max:255'],
            'whouse_code_to'=>['required', 'max:25','exists:whouses,code'],
            'material_part_no'=>['required', 'max:25', 'exists:materials,part_no'],
            'qty'=>['required', 'max:25'],
        ]);
        \App\Models\Request::create([
            'request_no' => $requestNo,
            'request_type_id' => 1,
            'district_id' => $request->input('district_id'),
            'whouse_from' => $request->input('whouse_code_from'),
            'district_id_to' => $request->input('district_id_to'),
            'whouse_to' => $request->input('whouse_code_to'),
            'material_part_no' => $request->input('material_part_no'),
            'quantity_req' => $request->input('qty'),
            'request_status_id' => 3,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('whousetransfers.index')->with('message', 'You created successfully');
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
