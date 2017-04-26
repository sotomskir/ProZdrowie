<?php

namespace App\Http\Requests;

use App\Models\Measurement;
use Illuminate\Foundation\Http\FormRequest;

class StoreMeasurement extends FormRequest
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
            'height' => 'required|numeric|min:100|max:250',
            'weight' => 'required|numeric|min:30|max:200',
            'waist' => 'required|numeric|min:30|max:200',
            'biceps' => 'required|numeric|min:15|max:100',
            'hips' => 'required|numeric|min:30|max:200',
            'thigh' => 'required|numeric|min:20|max:100',
            'chest' => 'required|numeric|min:30|max:200',
        ];
    }
}
