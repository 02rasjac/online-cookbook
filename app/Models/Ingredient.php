<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    /**
     * Get the ingredient-combinations this ingredient has
     */
    public function groupIngredient() {
        return $this->hasMany(GroupIngredient::class);
    }
}
