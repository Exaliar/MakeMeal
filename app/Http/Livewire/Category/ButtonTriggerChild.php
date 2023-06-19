<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;

class ButtonTriggerChild extends Component
{
    public $child;

    public function render()
    {
        return view('livewire.category.button-trigger-child');
    }
}
