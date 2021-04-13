<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_ingredients')->insert([
            'ingredient_group_id' => 1,
            'ingredient_id' => 1,
            'measurement_id' => 1,
            'quantity' => 500,
        ]);
        DB::table('group_ingredients')->insert([
            'ingredient_group_id' => 1,
            'ingredient_id' => 2,
            'measurement_id' => 2,
            'quantity' => 3,
        ]);
        DB::table('group_ingredients')->insert([
            'ingredient_group_id' => 1,
            'ingredient_id' => 3,
            'measurement_id' => 3,
            'quantity' => 2,
        ]);
        DB::table('group_ingredients')->insert([
            'ingredient_group_id' => 2,
            'ingredient_id' => 4,
            'measurement_id' => 1,
            'quantity' => 50,
        ]);
        DB::table('group_ingredients')->insert([
            'ingredient_group_id' => 2,
            'ingredient_id' => 5,
            'measurement_id' => 4,
            'quantity' => 4,
        ]);
    }
}
