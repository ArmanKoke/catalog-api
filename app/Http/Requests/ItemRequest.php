<?php

namespace App\Http\Requests;

use App\Rules\ValidateCategory;
use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => 'required|string|unique:items,name',
            'price' => 'required|integer',
            'category_id' => ['required', 'integer', new ValidateCategory],
        ];
    }
}
