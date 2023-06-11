<?php

namespace App\Http\Controllers;

use App\Models\Measurement;
use Illuminate\Http\Request;

class MeasurementController extends Controller
{
    public function index(Request $request){

        $search = $request->input('search');

        $measurement = Measurement::when($search, function ($query, $search) {

            return $query->where('name', 'like', "%$search%")
                ->orWhere('symbol', 'like', "%$search%");

        })->paginate(10);

        return view('measurement.index', compact('measurement'));
    }

    public function create()
    {
        return view('measurement.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'symbol' => 'required'
        ]);

        $data = $request->all();

        Measurement::create($data);

        return redirect()->route('measurement')->with('success', 'Measurement created successfully.');
    }

    public function edit(Measurement $measurement)
    {   
        return view('measurement.edit', compact('measurement'));
    }

    public function update(Request $request, Measurement $measurement)
    {
        $request->validate([
            'name' => 'required',
            'symbol' => 'required'
        ]);
    
        $measurement->update($request->all());

        return redirect()->route('measurement')->with('success', 'Measurement updated successfully.');
    }

    public function destroy(Measurement $measurement)
    {
        $measurement->delete();

        return redirect()->route('measurement')->with('success', 'Measurement deleted successfully.');
    }
}
