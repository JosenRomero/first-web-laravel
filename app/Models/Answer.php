<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /** @use HasFactory<\Database\Factories\AnswerFactory> */
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
    ];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function hearts()
    {
        return $this->morphMany(Heart::class, 'heartable');
    }

    // Returns true if a user liked it, returns false otherwise
    public function isHearted()
    {
        return $this->hearts()->where('user_id', 20)->exists(); // TODO: Replace user ID
    }

    // Adds a like from the user to the answer
    public function heart()
    {
        return $this->hearts()->create([
            'user_id' => 20, // TODO: Replace with authenticated user ID
        ]);
    }

    // Removes a like from the user for the answer
    public function unHeart()
    {
        return $this->hearts()->where('user_id', 20)->delete(); // TODO: Replace user ID
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
