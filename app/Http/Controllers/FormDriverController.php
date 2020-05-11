<?php

namespace App\Http\Controllers;

use App\Form;
use App\Http\Requests\FormRequest;

class FormDriverController extends Controller
{

    private $driver;

    public function __construct()
    {
        $this->driver = new Form();
    }

    public function addRequest(FormRequest $request)
    {
        $this->driver->addForm(0,$request);//TODO add request to database to get the driver number.
        return view('driverFormSuccess');
    }


}
