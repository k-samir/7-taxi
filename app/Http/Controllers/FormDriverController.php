<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Http\Requests\DriverRequest;

class FormDriverController extends Controller
{

    private $driver;

    public function __construct()
    {
        $this->driver = new Driver();
    }

    public function addRequest(DriverRequest $request)
    {
        $this->driver->addDriver($request);
        return view('driverFormSuccess');
    }


}
