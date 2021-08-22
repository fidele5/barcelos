<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Commande;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $delivery_men = User::role("delivery_man")->get();
        $commandes = Commande::all();
        return view("pages.backend.commades.index")->with(compact("commandes", "delivery_men"));
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
        $datas = Cart::where("client_id", Auth::user()->client->id)->get();
        $commande = Commande::create([
            "client_id" => Auth::user()->client->id,
            "status" => false,
            "comment" => $request->comment,
        ]);
        if ($commande) {
            if (count($datas) > 0) {
                foreach ($datas as $cart) {
                    $inserted = DB::insert('insert into article_commande (article_id, quantity, commande_id) values (?, ?, ?)', [
                        $cart->article_id,
                        $cart->quantity,
                        $commande->id,
                    ]);
                    if ($inserted) {
                        Cart::find($cart->id)->update([
                            "status" => 1,
                        ]);
                    }

                }
                return redirect("/articles");

            } else {
                return response()->json([
                    "status" => "failed",
                    "back" => "article",
                ], 403);
            }

        } else {
            return response()->json([
                "status" => "failure",
                "back" => "article",
            ], 500);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function show(Commande $commande)
    {
        $total = $commande->articles->sum(function ($item) {
            return $item->price * $item->pivot->quantity;
        });
        return view("pages.backend.commades.show")->with(compact("commande", "total"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function edit(Commande $commande)
    {
        return $commande;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commande $commande)
    {
        $commande = $commande->update($request->except("_token"));
        if ($commande) {
            return response()->json([
                "status" => "success",
                "back" => "article",
            ]);
        } else {
            return response()->json([
                "status" => "failure",
                "back" => "article",
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commande $commande)
    {
        if (!Auth::user()->can('manage_category')) {
            return redirect('home')->with(denied());
        } // end permission checking

        $commande = $commande->delete();
        if ($commande) {
            return response()->json([
                "status" => "success",
                "back" => "article",
            ]);
        } else {
            return response()->json([
                "status" => "failure",
                "back" => "article",
            ], 500);
        }
    }
}
