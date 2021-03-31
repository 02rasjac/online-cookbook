<?php

use App\Models\Recipie;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->enum('status', Recipie::STATUS_CHOICES)->default(Recipie::STATUS_PUBLISHED);
            $table->string('thumbnail')->default(Recipie::DEFAULT_THUMBNAIL);
            $table->string('title');
            $table->text('description');
            $table->integer('cook_time');
            $table->enum('difficulty', Recipie::DIFFICULTY_CHOICES);
            $table->float('rating')->nullable();
            $table->integer('portions');
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
        Schema::dropIfExists('recipies');
    }
}
