<?php

namespace App\Http\Controllers;

use App\Models\Recipie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CookbookController extends Controller
{
    public function myCookbook(Request $request) {
        $search_term = $request->search;
        $recipies = null;

        if (Auth::user() !== null) {
            $recipies = Recipie::where([
                ['title', '!=', Null],
                ['user_id', '=', Auth::user()->id],
                ['status', '!=', Recipie::STATUS_DELETED],
                [function($query) use($search_term) {
                    if ($search_term !== null) {
                        $query->orWhere('title', 'LIKE', '%' . $search_term . '%')->get();
                    }
                }]
            ])  ->orderBy('id', 'desc')
                ->paginate(12);
    
            $recipies->appends(['search' => $request->search]);
        }
        return view('cookbook', ['recipies' => $recipies, 'search' => $search_term]);
    }
}
