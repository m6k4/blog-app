<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{

  protected $with = [
		'topics',
	];

  public function topics(): BelongsTo
  {
    return $this->belongsTo(
      Topic::class,
      'topic_id'
    );
  }

}