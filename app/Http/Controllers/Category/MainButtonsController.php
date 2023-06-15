<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Traits\MainDashboard\AddCategory;
use App\Traits\MainDashboard\EditCategory;

class MainButtonsController extends Controller
{
    use EditCategory, AddCategory;

    /**
     * Handle the incoming request.
     */
    public function editCategory()
    {
        if ($this->canEditCategory()) {
            $this->unsetEditableCategory();
        } else {
            $this->makeEditableCategory();
        }
        return redirect()->route('category.index');
    }

    public function addCategory()
    {
        if ($this->canAddCategory()) {
            $this->unsetAddCategory();
        } else {
            $this->makeAddCategory();
        }
        return redirect()->route('category.index');
    }
}
