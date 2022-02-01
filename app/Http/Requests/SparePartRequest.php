<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class SparePartRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('spare_part_create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'stock_site_id' => ['required', 'string', 'exists:stock_sites,id'],
            'spare_part_category_id' => ['required', 'string', 'exists:spare_part_categories,id'],
            'code' => ['required', 'string'],
            'designation' => ['required', 'string'],
            'init_stock' => ['required','integer'],
            'alert_threshold' => ['required', 'integer'],
            'unite_price' => ['required', 'numeric'],
            'description' => ['required', 'string'],
            'observation' => ['required', 'string'],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        dd($validator->errors());
    }
}
