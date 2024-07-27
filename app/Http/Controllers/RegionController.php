<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index()
    {
        $regions = Region::latest()->paginate(5);
        return view('admin.regions.index', compact('regions'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.regions.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        Region::create($request->all());
        return redirect()->route('admin.regions.index')->with('success', 'Region created successfully.');
    }

    public function show(Region $region)
    {
        return view('admin.regions.show', compact('region'));
    }

    public function edit(Region $region)
    {
        return view('admin.regions.edit', compact('region'));
    }

    public function update(Request $request, Region $region)
    {
        $request->validate(['name' => 'required']);
        $region->update($request->all());
        return redirect()->route('admin.regions.index')->with('success', 'Region updated successfully.');
    }

    public function destroy(Region $region)
    {
        $region->delete();
        return redirect()->route('admin.regions.index')->with('success', 'Region deleted successfully.');
    }
}