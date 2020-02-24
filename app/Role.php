<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ADVANCED_RIGHTS = ['moderator', 'admin']; //todo in case too many rights divisions better implement permissions and keep tracking in db

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
