<?php

namespace App\Http\Controllers;

use App\Models\GroupIngredient;
use App\Models\IngredientGroup;
use App\Models\Recipie;
use Illuminate\Http\Request;

class RecipieController extends Controller
{
    public function index() {
        $recipie = Recipie::find(1);
        return view('single_recipie', ['recipie' => $recipie]);
    }
}
