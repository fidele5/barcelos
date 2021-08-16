<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();
        return view("pages.backend.location.index")->with("locations", $locations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.backend.location.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $location = Location::create($request->except("_token"));
        if ($location) {
            return response()->json([
                "status" => "success",
                "back" => "location",
            ]);
        } else {
            return response()->json([
                "status" => "failure",
                "back" => "location",
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        return $location;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        return view("pages.backend.location.edit")->with("location", $location);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        $location = $location->update($request->except("_token"));
        if ($location) {
            return response()->json([
                "status" => "success",
                "back" => "location",
            ]);
        } else {
            return response()->json([
                "status" => "failure",
                "back" => "location",
            ], 500);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        $location = $location->delete();
        if ($location) {
            return response()->json([
                "status" => "success",
                "back" => "location",
            ]);
        } else {
            return response()->json([
                "status" => "failure",
                "back" => "location",
            ], 500);
        }
    }
}
