<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Recipe extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'recipes';
    protected $fillable = [
        'user_id',
        'slug',
        'title',
        'excerpt',
        'description',
        'ingredients',
        'cooking_steps',
        'image',
        'likes'
    ];

    protected $casts = [
        'ingredients' => 'array',
        'cooking_steps' => 'array'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
