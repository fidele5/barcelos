<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Cart;
use App\Models\Categorie;
use App\Models\Commande;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Categorie::all();
        $articles = Article::orderBy('id', 'desc')
            ->take(6)
            ->get();
        return view('welcome')->with(compact("categories", "articles"));
    }

    public function admin()
    {
        if (!Auth::user()->hasRole("Super Admin")) {
            return redirect('home');
        }

        return view("home");
    }

    public function articles()
    {
        $articles = Article::all();
        $categories = Categorie::all();
        return view("pages.guest.articles")->with(compact("articles", "categories"));
    }

    public function checkout()
    {
        $articles = Cart::where("client_id", 1)->get();
        return view("pages.guest.checkout")->with("cart", $articles);
    }

    public function orders()
    {
        $orders = Commande::where("client_id", Auth::user()->client->id)->doesntHave("deliveries")->get();
        return view("pages.guest.orders")->with("commandes", $orders);

    }

    public function pastOrders()
    {
        $orders = Commande::where("client_id", Auth::user()->client->id)->has("deliveries")->get();
        return view("pages.guest.past_orders")->with("commandes", $orders);

    }
}
