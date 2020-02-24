<?php

namespace App\Http\Requests;

use App\Rules\ValidateRole;
use App\Rules\ValidateUserHasRole;
use Illuminate\Foundation\Http\FormRequest;

class UserDetachFromRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => [new ValidateUserHasRole],
            'role_id' => [new ValidateRole],
        ];
    }
}
