<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientGroup extends Model
{
    use HasFactory;

    /**
     * Get the ingredient-combinations this group has
     */
    public function recipieIngredient() {
        return $this->hasMany(RecipieIngredient::class);
    }
}
