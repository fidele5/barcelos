<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if (count(Categorie::all()) == 0) {
            Categorie::create([
                "designation" => "Sandwich",
                "code" => "S001",
                "description" => "Ma super description sur le produit",
                "thumbnails" => "backend/assets/images/product/default.png",
            ]);

            Categorie::create([
                "designation" => "Pizza",
                "code" => "S002",
                "description" => "Ma super description sur le produit",
                "thumbnails" => "backend/assets/images/product/default.png",
            ]);

        }

    }
}
