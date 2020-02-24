<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ADVANCED_RIGHTS = ['moderator', 'admin'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
