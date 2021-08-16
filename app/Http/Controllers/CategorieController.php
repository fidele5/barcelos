<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::all();
        return view("pages.backend.categories.index")->with("categories", $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.backend.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has("thumbnails")) {
            $val = $request->thumbnails->move('backend/assets/images/product/', time() . '.' . $request->thumbnails->extension());
        } else {
            $val = "backend/assets/images/product/default.png";
        }
        $categorie = Categorie::create([
            "designation" => $request->designation,
            "code" => $request->code,
            "description" => $request->description,
            "thumbnails" => $val,
        ]);
        if ($categorie) {
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
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        return $categorie;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $categorie)
    {
        return view("pages.backend.categories.edit")->with("categorie", $categorie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorie $categorie)
    {
        if ($request->has("thumbnails")) {
            $val = $request->thumbnails->move('backend/assets/images/product/', time() . '.' . $request->thumbnails->extension());
        } else {
            $val = "backend/assets/images/product/default.png";
        }

        $categorie = $categorie->update([
            "designation" => $request->designation,
            "code" => $request->code,
            "description" => $request->description,
            "thumbnails" => $val,
        ]);
        if ($categorie) {
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
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie)
    {
        $categorie = $categorie->delete();
        if ($categorie) {
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
