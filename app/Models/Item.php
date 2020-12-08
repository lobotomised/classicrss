<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'feed_id',
        'title',
        'author',
        'content',
        'url',
        'posted_at'
    ];

    protected $casts = [
        'batched_at' => 'datetime',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(feed::class);
    }
}
