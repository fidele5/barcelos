<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Commande;
use App\Models\Paiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PayPalPayment;
use Symfony\Component\HttpFoundation\JsonResponse;

class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create()
    {
        $datas = Cart::where("client_id", Auth::user()->client->id)
            ->where("status", false)
            ->get();

        $carts = [];

        foreach ($datas as $cart) {
            $item = [
                "sku" => $cart->article->sku,
                "quantity" => strval($cart->quantity),
                "name" => $cart->article->description,
                "price" => strval($cart->article->price),
                "currency" => "USD",
            ];
            array_push($carts, $item);
        }

        $total = collect($carts)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        $payer = new PayPalPayment();
        $payer->setSandboxMode(1);
        $payer->setClientID("AQU3S-livSMsq38K1CYoWPvODobRmjyOY9Se0f--AguUPtcGUTrSk7EGoE1im-CwzbzLtSgUcvCPMs9r");
        $payer->setSecret("EHxC5Bt-9_fpWy760fNLkDn09dnPOv0Povk0N_fldEpG5FIqNqa5x69HEmvgpgNsMc3WjrlwazTyreoQ");
        $payment_data = [
            "intent" => "sale",
            "redirect_urls" => [
                "return_url" => "http://localhost:8000/",
                "cancel_url" => "http://localhost:8000/",
            ],
            "payer" => [
                "payment_method" => "paypal",
            ],
            "transactions" => [
                [
                    "amount" => [
                        "total" => strval($total),
                        "currency" => "USD",
                    ],
                    "item_list" => [
                        "items" => $carts,
                    ],
                    "description" => "Commande ristorante",
                ],
            ],
        ];

        $paypal_response = $payer->createPayment($payment_data);
        $paypal_response = json_decode($paypal_response);

        if (!empty($paypal_response->id)) {
            $commande = Commande::create([
                "client_id" => Auth::user()->client->id,
                "status" => true,
                "comment" => "Mon super commentaire",
            ]);

            if ($commande) {
                Paiement::create([
                    "command_id" => $commande->id,
                    "payment_id" => $paypal_response->id,
                    "amount" => $paypal_response->transactions[0]->amount->total,
                    "status" => $paypal_response->state,
                ]);

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
            return response()->json([
                "status" => "success",
                "message" => "Paiement enregistrer avec success",
                "paypal_response" => $paypal_response,
            ]);

        } else {
            return response()->json([
                "status" => "failed",
                "message" => "Une erreur est survenue veuillez reesayer",
            ]);
        }

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

    public function authorized(Request $request): JsonResponse
    {
        $payer = new PayPalPayment();
        $payer->setSandboxMode(1);
        $payer->setClientID("AQU3S-livSMsq38K1CYoWPvODobRmjyOY9Se0f--AguUPtcGUTrSk7EGoE1im-CwzbzLtSgUcvCPMs9r");
        $payer->setSecret("EHxC5Bt-9_fpWy760fNLkDn09dnPOv0Povk0N_fldEpG5FIqNqa5x69HEmvgpgNsMc3WjrlwazTyreoQ");

        $paiement = Paiement::where("payment_id", $request->paymentID)->first();

        if ($paiement) {
            $paypal_response = $payer->executePayment($request->paymentID, $request->payerID);
            $paypal_response = json_decode($paypal_response);
            $paiement->update([
                "status" => $paypal_response->state,
            ]);

            if ($paypal_response->state == "approved") {
                Commande::find($paiement->command_id)->update([
                    "status" => true,
                ]);
                return response()->json([
                    "status" => "success",
                    "message" => "Paiement confirmed",
                ]);
            } else {
                return response()->json([
                    "status" => "failed",
                    "message" => "Paiement confirmed",
                ]);

            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function show(Paiement $paiement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function edit(Paiement $paiement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paiement $paiement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paiement $paiement)
    {
        //
    }
}
