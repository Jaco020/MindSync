<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content',
        'mood_rating',
        'mood_type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}