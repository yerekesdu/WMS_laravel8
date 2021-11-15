<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;

class IssueController extends Controller
{

    public function index()
    {
        $requests = \App\Models\Request::where('request_type_id', '2')->
        where('request_status_id',5)->orWhere(function($query)
        {
            $query->where('request_type_id', '1')
                ->where('request_status_id', '3');
        })->get();

        return view('issues.index', compact('requests'));
    }

    public function create()
    {
        $districts = District::all();
        return view('issues.create', compact('districts'));
    }

    public function store(Request $request)
    {
        $requestMaxId = \App\Models\Request::max('id');
        $requestNo =  "RC".str_pad($requestMaxId+1, 7, "0", STR_PAD_LEFT);

        $request->validate([
            'district_id'=>['required', 'max:255'],
            'whouse_code'=>['required', 'max:25','exists:whouses,code'],
            'material_part_no'=>['required', 'max:25', 'exists:materials,part_no'],
            'qty'=>['required', 'max:25'],
        ]);
        \App\Models\Request::create([
            'request_no' => $requestNo,
            'request_type_id' => 2,
            'district_id' => $request->input('district_id'),
            'material_part_no' => $request->input('material_part_no'),
            'quantity_req' => $request->input('qty'),
            'whouse_from' => $request->input('whouse_code'),
            'request_status_id' => 5,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('issues.index')->with('message', 'You created successfully');
    }

    public function show(Request $request)
    {
        dd($request);
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
