<?php

namespace App\Http\Livewire\IngredientList;

use App\Models\UserIngredient as ModelsUserIngredient;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserIngredient extends Component
{
    public $ingredientsDatabase;

    public function mount()
    {
        session(['ingredientList' => []]);
    }

    public function render()
    {
        $this->ingredientsDatabase = ModelsUserIngredient::with('ingredientAPI')->where('user_id', Auth::id())->get();
        return view('livewire.ingredient-list.user-ingredient');
    }
}
