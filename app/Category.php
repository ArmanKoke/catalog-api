<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['slug'];

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
