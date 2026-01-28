<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'is_draft',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'is_draft' => 'boolean',
            'published_at' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isPublished(): bool
    {
        return !$this->is_draft && ($this->published_at === null || $this->published_at <= now());
    }

    public function isScheduled(): bool
    {
        return !$this->is_draft && $this->published_at !== null && $this->published_at > now();
    }

    public function isDraft(): bool
    {
        return $this->is_draft;
    }

    public function scopePublished($query)
    {
        return $query->where('is_draft', false)
            ->where(function ($q) {
                $q->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            });
    }
}
