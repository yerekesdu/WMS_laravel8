<?php

namespace App\Http\Controllers;

use App\Models\RequestStatus;
use Illuminate\Http\Request;

class RequestStatusController extends Controller
{

    public function index()
    {
        $requestStatuses = RequestStatus::all();
        return view('requeststatuses.index', compact('requestStatuses'));
    }

    public function create()
    {
        return view('requeststatuses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code'=>['required', 'max:25'],
            'description'=>['required', 'max:50'],
        ]);

        RequestStatus::create([
            'code' => $request->input('code'),
            'description' => $request->input('description'),
        ]);
        return redirect()->route('requeststatuses.index')->with('message', 'You created successfully');
    }

    public function show(RequestStatus $requestStatus)
    {
        //
    }

    public function edit(RequestStatus $requestStatus)
    {
        //
    }

    public function update(Request $request, RequestStatus $requestStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequestStatus  $requestStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestStatus $requestStatus)
    {
        //
    }
}
