<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    use HasFactory;

    /**
     * Get the recipie that owns this instruction
     */
    public function recipie() {
        return $this->belongsTo(Recipie::class);
    }
}
