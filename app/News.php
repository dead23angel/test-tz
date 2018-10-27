<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'category_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeOfCategory($query, $category)
    {
        if ($category) {
            return $query->whereCategoryId($category);
        }

        return $query;
    }

    public function scopeOfUser($query, $user)
    {
        if ($user) {
            return $query->whereUserId($user);
        }

        return $query;
    }
}
