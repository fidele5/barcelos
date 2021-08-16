<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view("pages.backend.users.index")->with("users", $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $locations = Location::all();
        return view("pages.backend.users.create")->with(compact("roles", "locations"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile("avatar")) {
            $val = $request->avatar->move('backend/assets/images/users/', time() . '.' . $request->avatar->extension());
        } else {
            $val = "backend/assets/images/users/user.png";
        }

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "avatar" => $val,
            "password" => Hash::make($request->password),
            "location_id" => $request->location_id,
        ]);

        if ($user) {
            $user->assignRole($request->role);

            return response()->json([
                "status" => "success",
                "back" => "user",
            ]);
        } else {
            return response()->json([
                "status" => "failure",
                "back" => "user",
            ], 500);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $locations = Location::all();
        if (DB::table('model_has_roles')->where('model_id', $user->id)->count() > 0) {
            $selected_role = DB::table('model_has_roles')->where('model_id', $user->id)->first();
            $selected_role_id = $selected_role->role_id;
        } else {
            $selected_role_id = 0;
        }

        return view("pages.backend.users.edit")->with(compact("user", "locations", "roles", 'selected_role_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if ($request->hasFile("avatar")) {
            $val = $request->avatar->move('backend/assets/images/users/', time() . '.' . $request->avatar->extension());
        } else {
            $val = "backend/assets/images/users/user.png";
        }
        $request["avatar"] = $val;
        $request["password"] = Hash::make($request->password);

        $user = $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "avatar" => $val,
            "password" => Hash::make($request->password),
            "location_id" => $request->location_id,
        ]);
        if ($user) {
            return response()->json([
                "status" => "success",
                "back" => "user",
            ]);
        } else {
            return response()->json([
                "status" => "failure",
                "back" => "user",
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user = $user->delete();
        if ($user) {
            return response()->json([
                "status" => "success",
                "back" => "user",
            ]);
        } else {
            return response()->json([
                "status" => "failure",
                "back" => "user",
            ], 500);
        }

    }
}
