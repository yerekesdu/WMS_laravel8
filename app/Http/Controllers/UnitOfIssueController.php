<?php

namespace App\Http\Controllers;

use App\Models\UnitOfIssue;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class UnitOfIssueController extends Controller
{
    public function index()
    {
        $unitOfIssues = UnitOfIssue::all();
        return view('unitofissues.index', compact('unitOfIssues'));
    }

    public function create()
    {
        return view('unitofissues.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code'=>['required', 'max:5'],
            'description'=>['required', 'max:25'],
        ]);

        UnitOfIssue::create([
            'code' => $request->input('code'),
            'description' => $request->input('description'),
        ]);
        return redirect()->route('unitofissues.index')->with('message', 'You created successfully');
    }

    public function show(UnitOfIssue $unitOfIssue)
    {
        //
    }

    public function edit(UnitOfIssue $unitOfIssue)
    {
        //
    }

    public function update(Request $request, UnitOfIssue $unitOfIssue)
    {
        //
    }

    public function destroy(UnitOfIssue $unitOfIssue)
    {
        //
    }
}
