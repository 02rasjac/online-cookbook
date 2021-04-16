<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstructionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instructions')->insert([
            'recipie_id' => 1,
            'order' => 1,
            'text' => 'this is an instruction'
        ]);
        DB::table('instructions')->insert([
            'recipie_id' => 1,
            'order' => 2,
            'text' => 'this is another instruction'
        ]);
        DB::table('instructions')->insert([
            'recipie_id' => 1,
            'order' => 3,
            'text' => 'this is a third instruction with a timer',
            'timer' => 20
        ]);
        DB::table('instructions')->insert([
            'recipie_id' => 2,
            'order' => 1,
            'text' => 'this is an instruction for another recipie'
        ]);
        DB::table('instructions')->insert([
            'recipie_id' => 2,
            'order' => 2,
            'text' => 'this is another instruction for the other recipie'
        ]);
    }
}
