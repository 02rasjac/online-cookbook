<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipie extends Model
{
    use HasFactory;

    // Statuses used as enum in the migraiton
    const STATUS_PUBLISHED  = 'published';
    const STATUS_DRAFT      = 'draft';
    const STATUS_DELETED    = 'deleted';

    const STATUS_CHOICES = [
        Recipie::STATUS_PUBLISHED,
        Recipie::STATUS_DRAFT,
        Recipie::STATUS_DELETED,
    ];

    const DIFFICULTY_EASY   = 'easy';
    const DIFFICULTY_MEDIUM = 'medium';
    const DIFFICULTY_HARD   = 'hard';

    const DIFFICULTY_CHOICES = [
        Recipie::DIFFICULTY_EASY,
        Recipie::DIFFICULTY_MEDIUM,
        Recipie::DIFFICULTY_HARD,
    ];

    const DEFAULT_THUMBNAIL = 'images/default_thumbnail.png';
}