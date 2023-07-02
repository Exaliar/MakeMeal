<?php

namespace App\Http\Livewire\IngredientList;

use App\Models\UserIngredient as ModelsUserIngredient;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserIngredient extends Component
{
    public $ingredients;

    public function render()
    {
        $this->ingredients = ModelsUserIngredient::with('ingredientAPI')->where('user_id', Auth::id())->get();
        // dd($userIngredient->isEmpty());
        // dd($ingredients[0]->ingredientAPI->json_response_api);
        return view('livewire.ingredient-list.user-ingredient');
    }
}
