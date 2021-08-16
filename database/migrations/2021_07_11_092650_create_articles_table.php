<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string("designation");
            $table->text("description");
            $table->double("sku");
            $table->double("price");
            $table->string("thumbnails");
            $table->unsignedBigInteger("categorie_id");
            $table->unsignedBigInteger("location_id");
            $table->timestamps();
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->foreign("categorie_id")->references("id")->on("categories")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign("location_id")->references("id")->on("locations")->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
