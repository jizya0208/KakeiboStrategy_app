<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseRequest extends FormRequest
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
            'user_id' => 'required',
            'expense_type_id' => 'required',
            'expense_category_id' => 'required',
            'date' => 'required',
            'amount' => 'required | min:1',
            'summary'  => 'max:100',
        ];
    }
}
