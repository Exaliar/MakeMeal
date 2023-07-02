<?php

namespace App\Http\Controllers;

class UserIngredientController extends Controller
{
    public function __invoke()
    {
        return view('/user-ingredient');
    }
}
