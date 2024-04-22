<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Client\Request;


class PlantController extends Controller
{
    public function show(Plant $plant)
    {
        return view('plants.show', compact('plant'));
    }
    public function index()
    {
        $plants = Plant::all();
        return view('plants.index', compact('plants'));
    }
    public function create()
    {
        return view('plants.create');
    }
    public function store(Request $request)
    {
        $plant = Plant::create($request->all());
        return redirect()->route('plants.index');
    }
    public function edit(Plant $plant)
    {
        return view('plants.edit', compact('plant'));
    }

    public function update(Request $request, Plant $plant)
    {
        $plant->update($request->all());
        return redirect()->route('plants.index');
    }
    public function destroy(Plant $plant)
    {
        $plant->delete();
        return redirect()->route('plants.index');
    }
}
