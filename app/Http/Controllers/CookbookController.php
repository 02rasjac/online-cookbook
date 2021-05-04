<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CookbookController extends Controller
{
    public function index() {
        return view('cookbook');
    }
}
