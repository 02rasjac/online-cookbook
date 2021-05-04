<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipie extends Model
{
    use HasFactory;

    // Statuses used as enum in the migraiton
    const STATUS_PUBLIC  = 'public';
    const STATUS_PRIVATE = 'private';
    const STATUS_DELETED = 'deleted';
    const STATUS_CHOICES = [
        Recipie::STATUS_PUBLIC,
        Recipie::STATUS_PRIVATE,
        Recipie::STATUS_DELETED,
    ];

    // Difficulties as enum in migration
    const DIFFICULTY_EASY   = 'easy';
    const DIFFICULTY_MEDIUM = 'medium';
    const DIFFICULTY_HARD   = 'hard';
    const DIFFICULTY_CHOICES = [
        Recipie::DIFFICULTY_EASY,
        Recipie::DIFFICULTY_MEDIUM,
        Recipie::DIFFICULTY_HARD,
    ];

    // Available cooktimes.
    // Increment by 5, if x1, it's >x0 (i.e 61 = >60)
    const COOKTIMES = [
        5, 10, 15, 20, 25, 30, 35,
        40, 45, 50, 55, 60, 61
    ];

    const DEFAULT_THUMBNAIL = 'images/default_thumbnail.png';

    /**
     * Get the user that owns this recipie
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the ingredient-combinations this recipie has
     */
    public function ingredientGroup() {
        return $this->hasMany(IngredientGroup::class);
    }

    /**
     * Get the instructions this recipie has
     */
    public function recipieTags() {
        return $this->hasMany(RecipieTag::class);
    }

    /**
     * Get the instructions this recipie has
     */
    public function instruction() {
        return $this->hasMany(Instruction::class);
    }

    /**
     * @return int Number of ingredients that belongs to this recipie
     */
    public function numOfIngredients() {
        $num = 0;

        foreach ($this->ingredientGroup as $group) {
            $num += $group->groupIngredient->count();
        }

        return $num;
    }
}
