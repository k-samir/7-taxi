<?php

namespace App\Http\Controllers;

use App\Form;
use App\Http\Requests\FormRequest;

class FormDriverController extends Controller
{

    private $form;

    public function __construct()
    {
        $this->form = new Form();
    }

    public function addConductorShift(FormRequest $request)
    {
        $this->form->addForm($request);
        return view('home')->with(['message' => "Le conducteur a bien été ajouté"]);
    }


}
