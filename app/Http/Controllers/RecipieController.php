<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRecipieRequest;
use App\Models\GroupIngredient;
use App\Models\Ingredient;
use App\Models\IngredientGroup;
use App\Models\Instruction;
use App\Models\MeasurementUnit;
use App\Models\Recipie;
use App\Models\RecipieTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecipieController extends Controller
{
    public function createRecipie(Request $request) {
        $tags = Tag::all();
        $units = MeasurementUnit::all();
        $ingredients = Ingredient::where('verified', true)->orderBy('ingredient_name')->get();
        $cooktimes = Recipie::COOKTIMES;
        $recipie = new Recipie;

        return view('create_recipie', [
            'tags' => $tags,
            'units' => $units,
            'ingredients' => $ingredients,
            'cooktimes' => $cooktimes,
            'recipie' => $recipie,
        ]);
    }

    public function editRecipie(Request $request) {
        $tags = Tag::all();
        $units = MeasurementUnit::all();
        $ingredients = Ingredient::where('verified', true)->orderBy('ingredient_name')->get();
        $cooktimes = Recipie::COOKTIMES;

        $recipie = Recipie::where('id', $request->recipie_id)->first();

        return view('create_recipie', [
            'tags'          => $tags,
            'units'         => $units,
            'ingredients'   => $ingredients,
            'cooktimes'     => $cooktimes,
            'recipie'       => $recipie,
        ]);
    }

    public function uploadRecipie(UploadRecipieRequest $request) {
        $validated = $request->validated();
        $recipie = new Recipie;

        DB::beginTransaction();

        // Assign data to the model
        $recipie->user_id = Auth::user()->id;
        $recipie->status = $validated['isPublic'] ? Recipie::STATUS_PUBLIC : Recipie::STATUS_PRIVATE;
        $recipie->title = $validated['title'];
        $recipie->description = $validated['description'];
        $recipie->cook_time = $validated['cooktime'];
        $recipie->difficulty = $validated['difficulty'];
        $recipie->portions = $validated['portions'];
        $recipie->save();

        // Save tags in relation to model
        if ($validated['tag_id']) {
            foreach ($validated['tag_id'] as $tag) {
                $recipie_tag = new RecipieTag;
                $recipie_tag->recipie_id = $recipie->id;
                $recipie_tag->tag_id = $tag;
                $recipie->recipieTags()->save($recipie_tag);
            }
        }

        // Save the instruction
        //TODO: instruction should be array with multiple instruction containing order and timer.
        if ($validated['instruction']) {
            $instruction = new Instruction;
            $instruction->text = $validated['instruction'];
            $instruction->order = 1;
            $recipie->instruction()->save($instruction);
        }

        // dd($validated['groups']);
        // Save groups
        if ($validated['groups']) {
            foreach ($validated['groups'] as $group) {
                $ingredient_group = new IngredientGroup;
                $ingredient_group->title = $group['title'];
                $recipie->ingredientGroup()->save($ingredient_group);

                // Save ingredients
                foreach ($group['ingredients'] as $ingredient) {
                    $new_ingredient_data = new GroupIngredient;
                    $new_ingredient_data->ingredient_group_id = $ingredient_group->id;

                    // Retrive the "ingredient"-model with the same name
                    $new_ingredient = Ingredient::where('ingredient_name' ,'=', $ingredient['name'])->first();

                    // If that model doesn't exists, it creates a new one
                    if ($new_ingredient === null) {
                        $new_ingredient = new Ingredient;
                        $new_ingredient->ingredient_name = $ingredient['name'];
                        $new_ingredient->save();
                    }

                    // Assign the data for the ingredient
                    $new_ingredient_data->ingredient_id = $new_ingredient->id;
                    $new_ingredient_data->measurement_unit_id = $ingredient['measurement_id'];
                    $new_ingredient_data->quantity = $ingredient['quantity'];

                    $new_ingredient_data->save();
                }
            }
        }

        DB::commit();

        return redirect()->route('recipie', ['username' => Auth::user()->name, 'recipie_id' => $recipie->id]);
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
