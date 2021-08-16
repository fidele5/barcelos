<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view("pages.backend.clients.index")->with("clients", $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view("pages.backend.clients.create")->with("users", $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = Client::create($request->except("_token"));
        if ($client) {
            return response()->json([
                "status" => "success",
                "back" => "client",
            ]);
        } else {
            return response()->json([
                "status" => "failure",
                "back" => "client",
            ], 500);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return $client;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $users = User::all();
        return view("pages.backend.clients.edit")->with(compact("users", "client"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $client = $client->update($request->except("_token"));
        if ($client) {
            return response()->json([
                "status" => "success",
                "back" => "client",
            ]);
        } else {
            return response()->json([
                "status" => "failure",
                "back" => "client",
            ], 500);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client = $client->delete();
        if ($client) {
            return response()->json([
                "status" => "success",
                "back" => "client",
            ]);
        } else {
            return response()->json([
                "status" => "failure",
                "back" => "client",
            ], 500);
        }

    }
}
