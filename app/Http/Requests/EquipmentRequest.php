<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class EquipmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('equipment_create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        /*if (request()->routeIs('zones.store')) {


        } elseif (request()->routeIs('zones.update')) {

        }*/

        return [
            'name' => ['required', 'string', 'unique:equipment'],
            'code' => ['required', 'string', 'unique:equipment'],
            'serial_number' => ['required', 'string', 'unique:equipment'],
            'model' => ['required', 'string'],
            'zone_id' => ['required', 'string',],
            'picture' => ['required', 'string', 'file','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'power' => ['required', 'string'],
            'frequency' => ['required', 'string'],
            'electric_power' => ['required', 'string'],
            'voltage' => ['required', 'string'],
            'weight' => ['required', 'string'],
            'capacity' => ['required', 'string'],
            'compressed_air_pressure' => ['required', 'string'],
            'start' => ['required', 'string'],
            'length' => ['required', 'string'],
            'width' => ['required', 'string'],
            'height' => ['required', 'string'],
            'description' => ['required', 'string'],
            'electrical_schema' => ['required', 'string', 'file','mimes:jpeg,png,jpg,gif,svg,pdf,docs,zip','max:5000'],
            'plan' => ['required', 'string', 'file','mimes:jpeg,png,jpg,gif,svg,pdf,docs,zip','max:5000'],
            'special_tools' => ['required', 'string'],
            'manufacturer' => ['required', 'string'],
            'address' => ['required', 'string'],
            'phone_number' => ['required', 'string'],
            'email' => ['required', 'string'],
            'cost' => ['required', 'string'],
            'date_of_manufacture' => ['required', 'string'],
            'date_of_purchase' => ['required', 'string'],
            'installation_date' => ['required', 'string'],
            'commissioning_date' => ['required', 'string'],
            'file' => ['required', 'string', 'file','mimes:jpeg,png,jpg,gif,svg,pdf,docs,zip','max:5000'],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        dd($validator->errors());
    }
}
