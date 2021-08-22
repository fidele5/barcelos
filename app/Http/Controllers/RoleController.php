<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view("pages.backend.roles.index")->with("roles", $roles);
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
        $role = new Role();
        $role->name = $request->role['name'];
        $role->guard_name = 'web';
        $role->save();

        return response()->json([
            "status" => "success",
            "back" => "roles",
        ]);

    }

    public function permission(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $permissionRole = DB::table('role_has_permissions')
            ->select(DB::raw('CONCAT(role_id,"-",permission_id) AS detail'))
            ->pluck('detail')->toArray();

        return view("pages.backend.roles.permissions")->with(compact("roles", "permissions", "user", "permissionRole"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->name = $request->role['name'];
        $role->save();
        return response()->json([
            "status" => "success",
            "back" => "roles",
        ]);

    }

    public function savePermission(Request $request)
    {

        DB::table('role_has_permissions')->truncate();
        $permissions = $request->permission;
        if ($permissions != '') {
            foreach ($permissions as $r_key => $permission) {
                foreach ($permission as $p_key => $per) {
                    $values[] = $p_key;
                }

                if (count($values)) {
                    for ($i = 0; $i < count($values); $i++) {
                        DB::table('role_has_permissions')->insert([
                            'permission_id' => $values[$i],
                            'role_id' => $r_key,
                        ]);
                    }
                }

                unset($values);
            }
        }

        Artisan::call('cache:clear');
        return response()->json([
            "status" => "success",
            "back" => "admin/permissions",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return response()->json([
            "status" => "success",
        ]);

    }
}
