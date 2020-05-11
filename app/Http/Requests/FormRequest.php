<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as Request;
use Illuminate\Support\Facades\Auth;

class FormRequest extends Request
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
            'taxiNo' => ['min:1',],
            'dateStart' => ['date', 'after_or_equal:today',],
            'dateEnd' => ['date', 'after_or_equal:dateStart',],

            'startRecipe' => ['numeric', 'min:0',],
            'finalRecipe' => ['numeric', 'min:0',],
            'fixPrice' => ['numeric', 'min:0'],

            'mileageStart' => ['integer', 'min:0',],
            'mileageEnd' => ['integer', 'min:mileageStart',],
            'mileageLadenStart' => ['integer', 'min:0',],
            'mileageLadenEnd' => ['integer', 'min:mileageLadenStart',],
            'amountOfPassengersStart' => ['integer', 'min:0',],
            'amountOfPassengersEnd' => ['integer', 'min:amountOfPassengersStart',],
            'mileageInVehicleStart' => ['integer', 'min:0',],
            'mileageInVehicleEnd' => ['integer', 'min:mileageInVehicleStart',],

            'gaz' => ['numeric', 'min:0',],
            'credit' => ['numeric', 'min:0',],
            'various' => ['numeric', 'min:0',],
        ];
    }
}
