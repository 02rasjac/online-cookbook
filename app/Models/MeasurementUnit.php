<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeasurementUnit extends Model
{
    use HasFactory;

    // Define information about the primary key
    protected $primaryKey = 'measurement_name';
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * Get the ingredient-combinations this measurement-unit has
     */
    public function recipieIngredient() {
        return $this->hasMany(RecipieIngredient::class);
    }
}
