<?php

namespace App\Support;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostShowLoader
{
  public function load(Post $post)
  {
    return $post->load($this->getRelations());
  }

  protected function getRelations(): array
  {
    $userId = Auth::id();

    return [
      'user',
      'category',

      'comments' => fn($query) => $query->with([
        'user',
        'hearts' => fn($query) => $query->where('user_id', $userId),
      ]),

      'hearts' => fn($query) => $query->where('user_id', $userId),
    ];
  }
}
