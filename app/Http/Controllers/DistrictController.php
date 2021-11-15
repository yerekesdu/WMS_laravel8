<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;
use App\Models\Status;

class DistrictController extends Controller
{

    public function index()
    {
        $districts = District::with('status')->get();
        return view('districts.index', compact('districts'));
    }

    public function create()
    {
        $statuses = Status::all();
        return view('districts.create', compact('statuses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code'=>['required', 'max:10'],
            'name'=>['required', 'max:255'],
            'status_id'=>['required', 'max:25'],
        ]);

        District::create([
            'code' => $request->input('code'),
            'name' => $request->input('name'),
            'status_id' => $request->input('status_id'),
        ]);
        return redirect()->route('districts.index')->with('message', 'You created successfully');
    }

    public function show(District $district)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function edit(District $district)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, District $district)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function destroy(District $district)
    {
        //
    }
}
