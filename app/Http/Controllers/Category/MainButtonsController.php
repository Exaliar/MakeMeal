<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Traits\MainDashboard\AddCategory;
use App\Traits\MainDashboard\EditCategory;

class MainButtonsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function editCategory()
    {
        if (session()->has('editCategory')) {
            session()->forget('editCategory');
        } else {
            session()->put('editCategory', true);
        }
        return redirect()->route('category.index');
    }

    public function addCategory()
    {
        if (session()->has('addCategory')) {
            session()->forget('addCategory');
        } else {
            session()->put('addCategory', true);
        }
        return redirect()->route('category.index');
    }
}
