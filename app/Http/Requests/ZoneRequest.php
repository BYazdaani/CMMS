<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class ZoneRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('zone_create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        if (request()->routeIs('zones.store')) {

            $zoneRule = ['required', 'string', 'unique:zones'];

        } elseif (request()->routeIs('zones.update')) {

            $zoneRule = ['required', 'string', Rule::unique('zones')->ignore($this->zone->id)];

        }

        return [
            'room' => $zoneRule,
            'room_code' => $zoneRule,
        ];
    }

    public function failedValidation(Validator $validator)
    {
        dd($validator->errors());
    }
}
