<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipieTag extends Model
{
    use HasFactory;

    /**
     * Get the ingredient-combinations this recipie has
     */
    public function tag() {
        return $this->belongsTo(Tag::class);
    }

    /**
     * Get the ingredient-combinations this recipie has
     */
    public function recipie() {
        return $this->belongsTo(Recipie::class);
    }
}
