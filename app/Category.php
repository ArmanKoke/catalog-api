<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 */
class Category extends Model
{
    const SLUG_COLUMN_LENGTH = 50;

    protected $fillable = ['name'];

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
