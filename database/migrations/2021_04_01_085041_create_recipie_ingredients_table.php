<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipieIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipie_ingredients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recipie_id');
            $table->foreignId('ingredient_group_id');
            $table->foreignId('ingredient_id');
            $table->string('measurement_name');
            $table->foreign('measurement_name')->references('measurement_name')->on('measurement_units');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipie_ingredients');
    }
}
