<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class WorkRequestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('work_request_create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'equipment_id' => ['required', 'string', 'exists:equipment,id'],
            'description' => ['required', 'string'],
            'priority' => ['required', 'in:Haute,Moyenne,Basse'],
            'lot' => ['required', 'string'],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        dd($validator->errors());
    }
}
