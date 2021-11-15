<?php

namespace App\Http\Controllers;

use App\Models\RequestType;
use Illuminate\Http\Request;

class RequestTypeController extends Controller
{

    public function index()
    {
        $requestTypes = RequestType::all();
        return view('requesttypes.index', compact('requestTypes'));
    }

    public function create()
    {
        return view('requesttypes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code'=>['required', 'max:25'],
            'description'=>['required', 'max:50'],
        ]);

        RequestType::create([
            'code' => $request->input('code'),
            'description' => $request->input('description'),
        ]);
        return redirect()->route('requesttypes.index')->with('message', 'You created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RequestType  $requestType
     * @return \Illuminate\Http\Response
     */
    public function show(RequestType $requestType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequestType  $requestType
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestType $requestType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RequestType  $requestType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestType $requestType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequestType  $requestType
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestType $requestType)
    {
        //
    }
}
