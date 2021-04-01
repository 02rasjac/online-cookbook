<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MeasurementUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('measurement_units')->insert([
            'measurement_name' => 'gram',
        ]);
        DB::table('measurement_units')->insert([
            'measurement_name' => 'dl',
        ]);
        DB::table('measurement_units')->insert([
            'measurement_name' => 'krm',
        ]);
        DB::table('measurement_units')->insert([
            'measurement_name' => 'msk',
        ]);
        DB::table('measurement_units')->insert([
            'measurement_name' => 'cl',
        ]);
    }
}
