<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    /**
     * Get the recipies that has this tag has
     */
    public function recipieTag() {
        return $this->hasMany(RecipieTag::class);
    }
}
