<?php

namespace App\Http\Controllers;

use App\Models\Recipie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CookbookController extends Controller
{
    public function index() {
        $recipies = null;

        if (Auth::user() !== null) {
            $recipies = Auth::user()->recipies;
        }
        return view('cookbook', ['recipies' => $recipies]);
    }
}
