<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StressProneAreaRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'input_spa_stressecosystem' => ['required', 'array'],
            'input_spa_stressecosystem.*' => ['required'],
            'input_spa_totalfarmers' => ['required', 'numeric', 'min: 1'],
            'input_spa_totalstressarea' => ['required', 'numeric', 'min: 1'],

        ];
    }

    public function messages()
    {
        return [
            'input_spa_stressecosystem.required' => 'Stress Ecosystem field is required.',
            'input_spa_totalfarmers.min' => 'A.Farmer\'s Profile: Age field must be at least 1',
            'input_spa_totalstressarea.min' => 'A.Farmer\'s Profile: Age field must be at least 1',
        ];
    }
}
