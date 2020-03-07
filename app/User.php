<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

/**
 * @property int id bigInt
 * @property string name
 * @property bool is_active
 * @property string email
 * @property string created_at timestamp
 * @property string updated_at timestamp
 *
 * @property Role roles
 */
class User extends Authenticatable
{
    use Notifiable;

    const
        NAME_COLUMN_LENGTH = 100,
        EMAIL_COLUMN_LENGTH = 100;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /** todo change when permissions come
     * @return bool
     */
    public function hasPermission()
    {
        $roles = $this->getRoles(Auth::user());
        $user_roles_slugs = $roles->pluck('slug')->all();

        foreach ($user_roles_slugs as $user_roles_slug) {
            if (in_array($user_roles_slug, Role::ADVANCED_RIGHTS)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param User $user
     * @return Role
     */
    public function getRoles(self $user)
    {
        return $user->roles;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
}
