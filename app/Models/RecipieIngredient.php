<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipieIngredient extends Model
{
    use HasFactory;

    /**
     * Get the recipie that has this ingredient-combination this recipie
     */
    public function recipie() {
        return $this->belongsTo(Recipie::class);
    }

    /**
     * Get the group the ingredient belongs to in this recipie
     */
    public function ingredientGroup() {
        return $this->belongsTo(IngredientGroup::class);
    }

    /**
     * Get the ingredient
     */
    public function ingredient() {
        return $this->belongsTo(Ingredient::class);
    }

    /**
     * Get the unit of measurement
     */
    public function measurementUnit() {
        return $this->belongsTo(MeasurementUnit::class);
    }
}
