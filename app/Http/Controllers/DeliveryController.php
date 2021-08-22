<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Delivery;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{

    public function __construct()
    {
        if (!Auth::user()->can('manage_supplier')) {
            return redirect('home')->with(denied());
        } // end permission checking

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliveries = Delivery::all();
        return view("pages.backend.delivery.index")->with("deliveries", $deliveries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $commande = Commande::find($request->commande_id);
        $delivery = Delivery::create([
            "command_id" => $commande->id,
            "from_adress" => "ici",
            "to_adress" => $commande->client->adresse,
            "user_id" => $request->user_id,
            "sent_at" => Carbon::now()->toDateTimeString(),
        ]);
        if ($delivery) {
            return response()->json([
                "status" => "success",
                "back" => "../",
            ]);
        } else {
            return response()->json([
                "status" => "failure",
                "back" => "../",
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function show(Delivery $delivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery $delivery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Delivery $delivery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delivery $delivery)
    {

    }
}
