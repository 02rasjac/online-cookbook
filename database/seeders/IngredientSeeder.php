<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredients')->insert([
            'ingredient_name' => 'Chicken',
            'verified' => true,
        ]);
        DB::table('ingredients')->insert([
            'ingredient_name' => 'Onion',
            'verified' => true,
        ]);
        DB::table('ingredients')->insert([
            'ingredient_name' => 'Pepper',
            'verified' => true,
        ]);
        DB::table('ingredients')->insert([
            'ingredient_name' => 'Salt',
            'verified' => false,
        ]);
        DB::table('ingredients')->insert([
            'ingredient_name' => 'Vinager',
            'verified' => false,
        ]);
        DB::table('ingredients')->insert([
            'ingredient_name' => 'Chili',
            'verified' => true,
        ]);
    }
}
