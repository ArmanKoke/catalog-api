<?php

namespace App\Http\Requests;

use App\Http\Helpers\Interfaces\Token;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string aud
 * @property string sub
 * @property int exp
 */
class TokenRequest extends FormRequest implements Token
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
            'aud'           => 'required|string|max:'.self::AUD_LENGTH,
            'sub'           => 'string|max:'.self::SUB_LENGTH, //todo make required after vault
            'ext'           => 'numeric|gt:0',
        ];
    }
}
