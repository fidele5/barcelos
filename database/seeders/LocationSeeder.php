<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (count(Location::all()) == 0) {
            Location::create([
                "designation" => "Lubumbashi",
                "adresse" => "Q salama Av de la rive",
                "description" => "Ma super description",
            ]);
        }

    }
}
