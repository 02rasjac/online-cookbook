<?php

namespace App\Http\Controllers;

use App\Models\GroupIngredient;
use App\Models\IngredientGroup;
use App\Models\Recipie;
use Illuminate\Http\Request;

class RecipieController extends Controller
{
    public function showRecipie(Request $request, $username, $recipie_id) {
        $recipie = Recipie::find($recipie_id);
        return view('single_recipie', ['recipie' => $recipie]);
    }
}
