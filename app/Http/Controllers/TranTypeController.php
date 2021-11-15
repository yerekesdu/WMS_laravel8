<?php

namespace App\Http\Controllers;

use App\Models\TranType;
use Illuminate\Http\Request;

class TranTypeController extends Controller
{

    public function index()
    {
        $trantypes = TranType::all();
        return view('trantypes.index', compact('trantypes'));
    }

    public function create()
    {
        return view('trantypes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'code'=>['required', 'max:25'],
        'description'=>['required', 'max:50'],
    ]);

        TranType::create([
            'code' => $request->input('code'),
            'description' => $request->input('description'),
        ]);
        return redirect()->route('trantypes.index')->with('message', 'You created successfully');
    }

    public function show(TranType $tranType)
    {
        //
    }

    public function edit(TranType $tranType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TranType  $tranType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TranType $tranType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TranType  $tranType
     * @return \Illuminate\Http\Response
     */
    public function destroy(TranType $tranType)
    {
        //
    }
}
