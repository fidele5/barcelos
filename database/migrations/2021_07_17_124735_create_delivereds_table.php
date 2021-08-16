<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveredsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivereds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("delivery_id");
            $table->unsignedBigInteger("article_command_id");
            $table->timestamps();
        });

        Schema::table("delivereds", function (Blueprint $table) {
            $table->foreign("delivery_id")->references("id")->on("deliveries")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign("article_command_id")->references("id")->on("article_commande")->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivereds');
    }
}
