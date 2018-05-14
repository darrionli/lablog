<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * 一对多关联文章
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
