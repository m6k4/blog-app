<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{

  protected $with = [
		'topic',
    'author'
	];

  public function topic(): BelongsTo
  {
    return $this->belongsTo(
      Topic::class,
      'topic_id'
    );
  }

  public function author(): BelongsTo
  {
    return $this->belongsTo(
      User::class,
      'author_id'
    );
  }

}