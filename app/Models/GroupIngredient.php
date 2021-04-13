<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupIngredient extends Model
{
    use HasFactory;

    /**
     * Get the group that has this ingredient-combination this recipie
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
