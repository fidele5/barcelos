<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (count(Role::all()) == 0) {
            Role::create([
                'name' => 'Super Admin',
                'guard_name' => 'web',
            ]);

            Role::create([
                'name' => 'Branch Manager',
                'guard_name' => 'web',
            ]);

            Role::create([
                'name' => 'Delivery Man',
                'guard_name' => 'web',
            ]);

        }

    }
}
