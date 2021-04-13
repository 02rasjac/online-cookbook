<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RecipieSeeder::class,
            IngredientSeeder::class,
            IngredientGroupSeeder::class,
            MeasurementUnitSeeder::class,
            GroupIngredientSeeder::class,
        ]);

        // User::factory()->count(5)->hasRecipies(5)->create();
    }
}
