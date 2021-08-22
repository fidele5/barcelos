<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Delivered;
use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveredController extends Controller
{

    public function __construct()
    {
        parent::__construct();
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
        $delivereds = Delivered::all();
        return $delivereds;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Delivered  $delivered
     * @return \Illuminate\Http\Response
     */
    public function show(Delivered $delivered)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Delivered  $delivered
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivered $delivered)
    {

    }

    public function delivered($id)
    {
        $delivery = Delivery::find($id);
        $commande = Commande::find($delivery->command_id);
        foreach ($commande->articles as $aricle) {
            Delivered::create([
                "delivery_id" => $id,
                "article_command_id" => $aricle->id,
            ]);
        }
        return back();
    }

    public function delivereds($id)
    {
        $delivereds = Delivered::with("delivery", "article_command.article")->where("delivery_id", $id)->get();
        $delivery = Delivery::find($id);
        $commande = Commande::find($delivery->command_id);

        return view("pages.backend.delivery.delivered")->with(compact("delivereds", "commande"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Delivered  $delivered
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Delivered $delivered)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Delivered  $delivered
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delivered $delivered)
    {
        $delivered = $delivered->delete();
        if ($delivered) {
            return response()->json([
                "status" => "success",
                "back" => "../delivered",
            ]);
        } else {
            return response()->json([
                "status" => "failure",
                "back" => "../delivered",
            ], 500);
        }

    }
}
