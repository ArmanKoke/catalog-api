<?php

namespace App\Rules;

use App\User;
use Illuminate\Contracts\Validation\Rule;

class ValidateUserHasRole implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $user = User::find($value);

        if (count($user->roles()->get()) <= 1)
            return false;

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'User can not be detached from last role.';
    }
}
