<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'user_id',
        'category_id',
        'excerpt',
        'content',
        'thumbnail',
        'images',
        'tags',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta',
        'feature',
        'status'
    ];

    protected $casts = [
        'images' => 'array',
        'status' => 'boolean',
        'feature' => 'boolean',
    ];

    protected static function boot() {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = Str::slug($post->title);
        });
    }

    /**
     * Scope a query to only published scopes.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished(Builder $query)
    {
        return $query->where('status', '=', 1);
    }

    public function isPublished()
    {
        return true;
    }

}
