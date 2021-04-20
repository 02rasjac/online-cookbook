<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'name' => 'kött',
            'color' => '#ff0000'
        ]);
        DB::table('tags')->insert([
            'name' => 'gluten',
            'color' => '#ffff00'
        ]);
        DB::table('tags')->insert([
            'name' => 'vegetariskt',
            'color' => '#00ff00'
        ]);
    }
}
