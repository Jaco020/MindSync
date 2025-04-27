<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MindfulnessExercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'instructions',
        'duration_minutes',
        'difficulty'
    ];

    public function userProgress()
    {
        return $this->hasMany(UserProgress::class, 'exercise_id');
    }
}