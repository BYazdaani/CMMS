<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class WorkOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('work_order_create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'maintenance_technician_id' => ['required', 'string', 'exists:maintenance_technicians,id'],
            'work_request_id' => ['required', 'string', 'exists:work_requests,id'],
            'type' => ['required', 'string'],
            'nature' => ['required', 'string'],
            'description' => ['required', 'string'],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        dd($validator->errors());
    }
}
