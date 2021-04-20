<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipieTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipie_tags')->insert([
            'recipie_id' => 1,
            'tag_id' => 1,
        ]);
        DB::table('recipie_tags')->insert([
            'recipie_id' => 1,
            'tag_id' => 2,
        ]);
        DB::table('recipie_tags')->insert([
            'recipie_id' => 2,
            'tag_id' => 2,
        ]);
        DB::table('recipie_tags')->insert([
            'recipie_id' => 2,
            'tag_id' => 3,
        ]);
    }
}
