<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class FormChauffeurRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'driverNo' => ['integer', 'required',],
            'taxiNo' => ['integer',],
            'dateStart' => ['date', 'after_or_equal:today',],
            'dateEnd' => ['date', 'after_or_equal:today',],
            'recipe' => ['numeric',],

            'mileageStart' => ['integer',],
            'mileageEnd' => ['integer',],
            'mileageLadenStart' => ['integer',],
            'mileageLadenEnd' => ['integer',],
            'amountOfPassengersStart' => ['integer',],
            'amountOfPassengersEnd' => ['integer',],
            'mileageInVehicleStart' => ['integer',],
            'mileageInVehicleEnd' => ['integer',],

            'salary' => ['numeric', 'required',],
            'gaz' => ['numeric',],
            'credit' => ['numeric',],
            'various' => ['numeric',],
        ];
    }
}
