<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use App\Models\Location;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view("pages.backend.articles.index")->with("articles", $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        $locations = Location::all();
        return view("pages.backend.articles.create")->with(compact("categories", "locations"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile("thumbnails")) {
            $val = $request->thumbnails->move('backend/assets/images/product/', time() . '.' . $request->thumbnails->extension());
        } else {
            $val = "backend/assets/images/product/default.jpg";
        }

        $article = Article::create([
            "designation" => $request->designation,
            "description" => $request->description,
            "sku" => $request->sku,
            "price" => $request->price,
            "thumbnails" => $val,
            "categorie_id" => $request->categorie_id,
            "location_id" => $request->location_id,
        ]);
        if ($article) {
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
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view("pages.guest.single_article")->with("article", $article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Categorie::all();
        $locations = Location::all();
        return view("pages.backend.articles.edit")->with(compact("article", "categories", "locations"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        if ($request->has("thumbnails")) {
            $val = $request->thumbnails->move('backend/assets/images/product/', time() . '.' . $request->thumbnails->extension());
        } else {
            $val = "backend/assets/images/product/default.jpg";
        }
        $request["thumbnails"] = $val;

        $article = $article->update([
            "designation" => $request->designation,
            "description" => $request->description,
            "sku" => $request->sku,
            "price" => $request->price,
            "thumbnails" => $val,
            "caregorie_id" => $request->categorie_id,
            "location_id" => $request->location_id,
        ]);

        if ($article) {
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
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article = $article->delete();
        if ($article) {
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
