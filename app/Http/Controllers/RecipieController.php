<?php

namespace App\Http\Controllers;

use App\Models\GroupIngredient;
use App\Models\Ingredient;
use App\Models\IngredientGroup;
use App\Models\MeasurementUnit;
use App\Models\Recipie;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class RecipieController extends Controller
{
    public function createRecipie(Request $request) {
        $tags = Tag::all();
        $units = MeasurementUnit::all();
        $ingredients = Ingredient::where('verified', true)->orderBy('ingredient_name')->get();
        return view('create_recipie', [
            'tags' => $tags,
            'units' => $units,
            'ingredients' => $ingredients,
        ]);
    }

    /**
     * Get the requested recipie's data
     */
    public function showRecipie(Request $request, $username, $recipie_id) {
        $recipie = Recipie::find($recipie_id);

        // Make sure it's the correct user-owner
        if ($recipie->user->name === $username) {
            return view('single_recipie', ['recipie' => $recipie]);
        }

        abort(404);
    }
}
