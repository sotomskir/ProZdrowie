<?php

namespace App\Http\Requests;

use App\Models\Measurement;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMeasurement extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $measurement = $this->route('measurement');
        return $measurement && $this->user()->can('update', $measurement);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return (new StoreMeasurement())->rules();
    }
}
