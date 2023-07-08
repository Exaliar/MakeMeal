<?php

namespace App\Http\Livewire\RecipeList;

use Livewire\Component;

class CardRecipe extends Component
{
    public array $recipe;

    public function mount(array $recipe)
    {
        $this->recipe = $recipe;
    }

    public function render()
    {
        return view('livewire.recipe-list.card-recipe');
    }
}
