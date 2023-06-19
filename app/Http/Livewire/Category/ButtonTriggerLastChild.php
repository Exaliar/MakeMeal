<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;

class ButtonTriggerLastChild extends Component
{
    public $lastChild;

    public function render()
    {
        return view('livewire.category.button-trigger-last-child');
    }
}
