<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
    ];

    public function hearts()
    {
        return $this->morphMany(Heart::class, 'heartable');
    }

    // Returns true if a user liked it, returns false otherwise
    public function isHearted()
    {
        return $this->hearts()->where('user_id', 20)->exists(); // TODO: Replace with authenticated user ID
    }

    // Adds a like from the user to the comment
    public function heart()
    {
        return $this->hearts()->create([
            'user_id' => 20, // TODO: Replace with authenticated user ID
        ]);
    }

    // Removes a like from the user for the comment
    public function unHeart()
    {
        return $this->hearts()->where('user_id', 20)->delete(); // TODO: Replace user ID
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
