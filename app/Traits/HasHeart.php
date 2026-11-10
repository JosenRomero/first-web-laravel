<?php

namespace App\Traits;

use App\Models\Heart;

trait HasHeart
{
  public function hearts()
  {
    return $this->morphMany(Heart::class, 'heartable');
  }

  // Returns true if a user liked it, returns false otherwise
  public function isHearted()
  {
    if ($this->relationLoaded('hearts')) {
      return $this->hearts->isNotEmpty();
    }
    return $this->hearts()->where('user_id', 20)->exists(); // TODO: Replace user ID
  }

  // Adds a like from the user to the answer, question or comment
  public function heart()
  {
    return $this->hearts()->create([
      'user_id' => 20, // TODO: Replace user ID
    ]);
  }

  // Removes a like from the user to the answer, question or comment
  public function unHeart()
  {
    return $this->hearts()->where('user_id', 20)->delete(); // TODO: Replace user ID
  }
}
