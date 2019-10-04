<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $with = ['category'];

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
