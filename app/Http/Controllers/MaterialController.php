<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Status;
use Illuminate\Http\Request;
use App\Models\UnitOfIssue;

class MaterialController extends Controller
{

    public function index()
    {
        $materials = Material::with('unit_of_issue')->get();
        return view('materials.index', compact('materials'));
    }

    public function create()
    {
        $statuses = Status::all();
        $unit_of_issues = UnitOfIssue::all();
        return view('materials.create', compact('unit_of_issues', 'statuses'));
    }

    public function store(Request $request)
    {
        $materialMaxId = Material::max('id');
        $partNo =  "M".str_pad($materialMaxId+1, 9, "0", STR_PAD_LEFT);

        $request->validate([
            'name'=>['required', 'max:255'],
            'unit_of_issue_id'=>['required', 'max:25'],
            'status_id'=>['required', 'max:25'],
        ]);

        Material::create([
            'part_no' => $partNo,
            'name' => $request->input('name'),
            'unit_of_issue_id' => $request->input('unit_of_issue_id'),
            'status_id' => $request->input('status_id'),
        ]);
        return redirect()->route('materials.index')->with('message', 'You created successfully');
    }

    public function show(Material $material)
    {
        //
    }

    public function edit(Material $material)
    {
        //
    }

    public function update(Request $request, Material $material)
    {
        //
    }

    public function destroy(Material $material)
    {
        //
    }
}
