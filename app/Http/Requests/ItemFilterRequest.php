<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property int price
 * @property int weight
 * @property string created_at
 * @property string color
 *
 * @property mixed price_operand
 * @property mixed weight_operand
 * @property mixed created_at_operand
 */
class ItemFilterRequest extends FormRequest
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
        //todo add new validator class for undefined params
        return [
            'price'           => 'required_with:price_operand|numeric|gt:0',
            'weight'          => 'required_with:weight_operand|numeric|gt:0',
            'created_at'      => 'required_with:created_at_operand', //todo validate correct format
            'category_id'     => 'numeric',
            'color'           => 'string',

            'price_operand'         => 'required_with:price|regex:/^[>\<\>=\<=\=]*$/i', //todo not allow => or =<
            'weight_operand'        => 'required_with:weight|regex:/^[>\<\>=\<=\=]*$/i',
            'created_at_operand'    => 'required_with:created_at|regex:/^[>\<\>=\<=\=]*$/i',
       ];
    }
}
