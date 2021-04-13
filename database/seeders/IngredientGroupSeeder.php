<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredient_groups')->insert([
            'recipie_id' => 1,
            'title' => 'Homo',
        ]);
        DB::table('ingredient_groups')->insert([
            'recipie_id' => 1,
            'title' => 'sapiens',
        ]);
    }
}
