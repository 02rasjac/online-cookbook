<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function uploadProfileImage(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image',
        ]);

        User::uploadProfileImage($validated['image']);
        return redirect()->back();

    }
}
