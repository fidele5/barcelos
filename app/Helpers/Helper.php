<?php

use App\Models\Article;
use App\Models\Cart;
use App\Models\Client;
use App\Models\Commande;
use App\Models\Location;
use App\Models\Paiement;

function cardData($user_id)
{
    $cart_data = Cart::where("client_id", $user_id)
        ->where("status", false)
        ->get();
    return $cart_data;
}

function getTotal($user_id)
{
    $cart_data = Cart::where("client_id", $user_id)
        ->where("status", false)
        ->get();
    $sum = $cart_data->sum(function ($item) {
        return $item->article->price * $item->quantity;
    });

    return $sum;

}

function get_locations()
{
    return Location::all();
}

function getTotalSells()
{
    $commandes = Commande::where("status", false)->get();
    if (count($commandes) == 0) {
        return 0;
    } else {
        return $commandes->sum(function ($commande) {
            return $commande->articles->sum(function ($item) {
                return $item->price * $item->pivot->quantity;
            });
        });
    }
}

function getMonthlySells()
{
    $commandes = Commande::where("status", false)
        ->whereMonth('created_at', date('m'))
        ->whereYear('created_at', date('Y'))
        ->get();
    return $commandes;
}

function getSoldArticles()
{
    return count(Commande::where("status", false)->get());
}

function allCLients()
{
    return count(Client::all());
}

function getMonthlyTotal()
{
    $commandes = Commande::where("status", false)
        ->whereMonth('created_at', date('m'))
        ->whereYear('created_at', date('Y'))
        ->get();
    return count($commandes);
}

function getSuccesCmd($status)
{
    $commandes = Commande::where("status", $status)
        ->get();
    return count($commandes);
}

function getPaiementStatus($status)
{
    $commandes = Paiement::where("status", $status)
        ->get();
    return count($commandes);
}

function getNetBenefit()
{

}

function getLocationProducts()
{
    return Location::with('articles')->all();
}

function getRoutePath()
{
    $current = Route::currentRouteName();
    $link = explode(".", $current);
    return ucfirst($link[0]);
}

function getNetProfit()
{
    $commandes = Commande::where("status", false)->get();
    $articles = Article::all();
    if (count($commandes) == 0) {
        return 0;
    } else {
        $sells = $commandes->sum(function ($commande) {
            return $commande->articles->sum(function ($item) {
                return $item->price * $item->pivot->quantity;
            });
        });
        $purchases = $articles->sum('price');

        return $sells - $purchases;
    }

}

function getLocation()
{
    $locations = Location::all();
    return $locations[0];
}
