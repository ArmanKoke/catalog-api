<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    const NAME_COLUMN_LENGTH = 100;
    protected $fillable = ['name'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
