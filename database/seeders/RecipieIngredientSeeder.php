<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipieIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipie_ingredients')->insert([
            'recipie_id' => 1,
            'ingredient_group_id' => 1,
            'ingredient_id' => 1,
            'measurement_name' => 'gram',
            'quantity' => 500,
        ]);
        DB::table('recipie_ingredients')->insert([
            'recipie_id' => 1,
            'ingredient_group_id' => 1,
            'ingredient_id' => 2,
            'measurement_name' => 'dl',
            'quantity' => 3,
        ]);
        DB::table('recipie_ingredients')->insert([
            'recipie_id' => 1,
            'ingredient_group_id' => 1,
            'ingredient_id' => 3,
            'measurement_name' => 'krm',
            'quantity' => 2,
        ]);
        DB::table('recipie_ingredients')->insert([
            'recipie_id' => 1,
            'ingredient_group_id' => 2,
            'ingredient_id' => 4,
            'measurement_name' => 'gram',
            'quantity' => 50,
        ]);
        DB::table('recipie_ingredients')->insert([
            'recipie_id' => 1,
            'ingredient_group_id' => 2,
            'ingredient_id' => 5,
            'measurement_name' => 'dl',
            'quantity' => 4,
        ]);
    }
}
