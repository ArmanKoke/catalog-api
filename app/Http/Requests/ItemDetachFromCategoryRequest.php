<?php

namespace App\Http\Requests;

use App\Rules\ValidateCategory;
use App\Rules\ValidateItemHasCategory;
use Illuminate\Foundation\Http\FormRequest;

class ItemDetachFromCategoryRequest extends FormRequest
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
            'item_id' => [new ValidateItemHasCategory],
            'category_id' => [new ValidateCategory],
        ];
    }
}
