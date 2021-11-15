<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Whouse;
use Illuminate\Http\Request;
use App\Models\Status;

class WhouseController extends Controller
{

    public function index()
    {
        $whouses = Whouse::with('status')->get();
        return view('whouses.index', compact('whouses'));
    }

    public function create()
    {
        $statuses = Status::all();
        $districts = District::all();
        return view('whouses.create', compact('statuses', 'districts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code'=>['required', 'max:10'],
            'name'=>['required', 'max:255'],
            'district_id'=>['required', 'max:25'],
            'status_id'=>['required', 'max:25'],
        ]);

        Whouse::create([
            'code' => $request->input('code'),
            'name' => $request->input('name'),
            'district_id' => $request->input('district_id'),
            'status_id' => $request->input('status_id'),
        ]);
        return redirect()->route('whouses.index')->with('message', 'You created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Whouse  $whouse
     * @return \Illuminate\Http\Response
     */
    public function show(Whouse $whouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Whouse  $whouse
     * @return \Illuminate\Http\Response
     */
    public function edit(Whouse $whouse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Whouse  $whouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Whouse $whouse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Whouse  $whouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Whouse $whouse)
    {
        //
    }
}
