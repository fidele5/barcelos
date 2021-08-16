<?php

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
namespace Database\Seeders;

class AppSettings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (count(User::all()) == 0) {
            $user = User::create([
                "name" => "Naruto",
                "email" => "naruto@shinobi.ko",
                'location_id' => 1,
                "avatar" => "backend/assets/images/users/user.png",
                'password' => Hash::make(12345678),
            ]);

            $customer = Client::create([
                'nom' => 'John Doe',
                'prenom' => 'Maestoso',
                'phone' => '123 456 789',
                'email' => 'johndoe@example.com',
                'addresse' => 'Customer Address',
                'user_id' => $user->id,
            ]);

            $user->assignRole(Role::first());

        }

    }
}
