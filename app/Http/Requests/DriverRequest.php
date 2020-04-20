<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ChauffeurRequest extends FormRequest
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
            'driverNo' => ['integer', 'min:1', 'required',],
            'taxiNo' => ['integer', 'min:1',],
            'dateStart' => ['date', 'after_or_equal:today',],
            'dateEnd' => ['date', 'after_or_equal:dateStart',],
            'recipe' => ['numeric', 'min:0',],

            'mileageStart' => ['integer', 'min:0',],
            'mileageEnd' => ['integer', 'min:mileageStart',],
            'mileageLadenStart' => ['integer', 'min:0',],
            'mileageLadenEnd' => ['integer', 'min:mileageLadenStart',],
            'amountOfPassengersStart' => ['integer', 'min:0',],
            'amountOfPassengersEnd' => ['integer', 'min:amountOfPassengersStart',],
            'mileageInVehicleStart' => ['integer', 'min:0',],
            'mileageInVehicleEnd' => ['integer', 'min:mileageInVehicleStart',],

            'salary' => ['numeric', 'required',],
            'gaz' => ['numeric', 'min:0',],
            'credit' => ['numeric', 'min:0',],
            'various' => ['numeric', 'min:0',],
        ];
    }
}
