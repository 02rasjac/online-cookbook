<?php

namespace Database\Seeders;

use App\Models\Recipie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipies')->insert([
            'user_id' => 1,
            'status' => Recipie::STATUS_PUBLISHED,
            'title' => 'first test recipie',
            'description' => 'Lorem ipsum dolor sit amet, 
                            consectetur adipiscing elit. Duis nec urna elit. Vivamus et felis.',
            'cook_time' => 15,
            'difficulty' => Recipie::DIFFICULTY_MEDIUM,
            'portions' => 4,
        ]);
    }
}
