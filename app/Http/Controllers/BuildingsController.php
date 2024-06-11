<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\BuildingCategory;
use App\Models\User;
use Illuminate\Http\Request;

class BuildingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $mode = $request->query('mode');
        $demo = $request->query('demo');
        $buildings = Building::with('owner', 'category')->get();
        return view('buildings.index', compact('buildings'), ['mode' => $mode, 'demo' => $demo]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::get();
        $buildings = Building::with('owner', 'category')->get();
        $categories = BuildingCategory::get();
        return view('buildings.create', compact('buildings', 'users', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required',
            'construction_type' => 'required',
            'year_built' => 'required|integer',
            'units_in_building' => 'required|integer',
            'bathrooms' => 'required|integer',
            'bedrooms' => 'required|integer',
            'flooring' => 'required',
            'amenities' => 'required',
            'cooling' => 'required',
            'other_features' => 'required',
            'pictures' => 'nullable|json',
            'rent_price' => 'required|numeric',
            'owner_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:building_categories,id',
        ]);

        $details = [
            'Construction Type' => $validatedData['construction_type'],
            'Year Built' => $validatedData['year_built'],
            'Units in Building' => $validatedData['units_in_building'],
            'Bathrooms' => $validatedData['bathrooms'],
            'Bedrooms' => $validatedData['bedrooms'],
            'Flooring' => $validatedData['flooring'],
            'Amenities' => $validatedData['amenities'],
            'Cooling' => $validatedData['cooling'],
            'Other Features' => $validatedData['other_features'],
        ];

        $building = Building::create([
            'description' => $validatedData['description'],
            'details' => $details,
            'pictures' => $validatedData['pictures'],
            'rent_price' => $validatedData['rent_price'],
            'owner_id' => $validatedData['owner_id'],
            'category_id' => $validatedData['category_id'],
        ]);

        return redirect()->route('buildings.show', $building->id)->with('success', 'Building created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $building = Building::with('owner', 'category')->findOrFail($id);
        $users = User::get();
        $categories = BuildingCategory::get();
        return view('buildings.show', compact('building', 'users', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $building = Building::with('owner', 'category')->findOrFail($id);
        $users = User::get();
        $categories = BuildingCategory::get();
        return view('buildings.edit', compact('building', 'users', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'description' => 'required',
            'construction_type' => 'required',
            'year_built' => 'required|integer',
            'units_in_building' => 'required|integer',
            'bathrooms' => 'required|integer',
            'bedrooms' => 'required|integer',
            'flooring' => 'required',
            'amenities' => 'required',
            'cooling' => 'required',
            'other_features' => 'required',
            'pictures' => 'nullable|json',
            'rent_price' => 'required|numeric',
            'owner_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:building_categories,id',
        ]);

        $details = [
            'Construction Type' => $validatedData['construction_type'],
            'Year Built' => $validatedData['year_built'],
            'Units in Building' => $validatedData['units_in_building'],
            'Bathrooms' => $validatedData['bathrooms'],
            'Bedrooms' => $validatedData['bedrooms'],
            'Flooring' => $validatedData['flooring'],
            'Amenities' => $validatedData['amenities'],
            'Cooling' => $validatedData['cooling'],
            'Other Features' => $validatedData['other_features'],
        ];

        $building = Building::findOrFail($id);
        $building->update([
            'description' => $validatedData['description'],
            'details' => $details,
            'pictures' => $validatedData['pictures'],
            'rent_price' => $validatedData['rent_price'],
            'owner_id' => $validatedData['owner_id'],
            'category_id' => $validatedData['category_id'],
        ]);

        return redirect()->route('buildings.show', $building->id)->with('success', 'Building updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Building $building)
    {
        $building->delete();
        return redirect()->route('buildings.index')->with('success', 'Building deleted successfully.');
    }
}
