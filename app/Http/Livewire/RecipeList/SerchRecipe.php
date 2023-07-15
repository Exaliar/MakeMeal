<?php

namespace App\Http\Livewire\RecipeList;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SerchRecipe extends Component
{


    public array $recipes = [];
    public int $numOfResults = 100;


    protected $listeners = ['recipeSerch'];

    public function render()
    {
        return view('livewire.recipe-list.serch-recipe');
    }

    public function recipeSerch()
    {
        $this->resetErrorBag('ingredient');

        if (blank(session('ingredientList'))) {
            $this->addError('ingredient', 'Please select some ingredients before hitting the search button!');
            return false;
        }

        $this->recipes = $this->findRecipes();
    }

    private function findRecipes(): array
    {

        $nameIngredients = implode(",", session('ingredientList'));

        $response = Http::withHeaders([
            'x-api-key' => config('app.spoon_api_key'),
        ])->get('https://api.spoonacular.com/recipes/findByIngredients', [
            'ingredients' => $nameIngredients,
            'number' => $this->numOfResults,
            'limitLicense' => true,
            'ranking' => 1,
            'ignorePantry' => false,
        ]);

        if ($response->failed()) {
            $message = match ($response->status()) {
                '400' => 'API response was failed!!',
                '401' => 'API unauthorized!!',
                '429' => 'API to many request!!',
                '500' => 'API server not respond!!',
                default => 'API unknow error!!'
            };
            $this->addError('ingredient', $message);
            return [];
        }

        if ($response->successful()) {
            return $response->json();
        }
    }
}
