<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;

class ButtonTriggerCategory extends Component
{
    public $category;

    public function render()
    {
        return view('livewire.category.button-trigger-category');
    }
}
