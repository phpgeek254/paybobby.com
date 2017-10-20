<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['title', 'description', 'attachment', 'deadline', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
