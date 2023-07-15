<?php

namespace App\Http\Livewire\IngredientList;

use App\Models\UserIngredient as ModelsUserIngredient;
use Livewire\Component;

class CardIngredient extends Component
{
    public object $ingredient;
    public bool $ingredientsSelected = false;
    public int $weight;
    public string $unit;
    public int $idIngredient;
    public string $name;

    public function mount(ModelsUserIngredient $ingredient)
    {
        $this->unit = $ingredient->unit;
        $this->weight = intval($ingredient->weight);
        $this->ingredient = $ingredient;
        $this->idIngredient = intval($ingredient->ingredient_a_p_i_id);
        $this->name = $ingredient->ingredientAPI->json_response_api['name'];
    }

    public function render()
    {
        return view('livewire.ingredient-list.card-ingredient');
    }

    public function updatedIngredientsSelected(bool $value)
    {
        $data = session()->pull('ingredientList');
        if ($value) {
            $data[$this->idIngredient] = $this->name;
        } else {
            unset($data[$this->idIngredient]);
        }
        session()->put('ingredientList', $data);
    }

    public function saveIngredient()
    {
        $ingredient = ModelsUserIngredient::where('id', $this->ingredient->id)->first();
        $ingredient->weight = $this->weight;
        $ingredient->unit = $this->unit;
        $ingredient->save();
    }
}
