<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    const SLUG_COLUMN_LENGTH = 50;

    protected $fillable = ['name'];

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
