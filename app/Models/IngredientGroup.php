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
    public function recipie() {
        return $this->belongsTo(Recipie::class);
    }

    /**
     * Get the ingredient-combinations this group has
     */
    public function groupIngredient() {
        return $this->hasMany(GroupIngredient::class);
    }
}
