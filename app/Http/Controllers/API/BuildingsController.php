<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\BuildingCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;

class BuildingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $buildings = DB::table('buildings')->get();
        $buildings = DB::table('buildings')->leftJoin('users', 'buildings.owner_id', '=', 'users.id')->leftJoin('building_categories', 'buildings.id', '=', 'building_categories.id')->select('buildings.*', 'building_categories.name')->get();
        $buildingsArray = $buildings->toArray();

        foreach ($buildingsArray as &$building) {
            if (isset($building->details)) {
                $building->details = json_decode($building->details, true);
            }
            if (isset($building->pictures)) {
                $building->pictures = json_decode($building->pictures, true);
            }
        }

        return response()->json($buildings);
    }

    public function storeTrans(Request $request)
    {
        $validatedData = $request->validate([
            'building_id' => 'required|exists:buildings,id',
            'renter_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'total_amount' => 'required|numeric',
        ]);

        $transaction = Transaction::create($validatedData);

        return response()->json(['message' => 'Transaction created successfully', 'transaction' => $transaction], 201);
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

        return response()->json($building, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $buildings = DB::table('buildings')->leftJoin('users', 'buildings.owner_id', '=', 'users.id')->leftJoin('building_categories', 'buildings.id', '=', 'building_categories.id')->where('buildings.id', '=', $id)->select('buildings.*', 'building_categories.name')->get();
        $buildingsArray = $buildings->toArray();

        foreach ($buildingsArray as &$building) {
            if (isset($building->details)) {
                $building->details = json_decode($building->details, true);
            }
            if (isset($building->pictures)) {
                $building->pictures = json_decode($building->pictures, true);
            }
        }
        return response()->json($buildings);
    }

    /**
     * Update the specified resource in storage.
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

        return response()->json($building);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $building = Building::findOrFail($id);
        $building->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
