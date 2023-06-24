<?php

namespace App\Http\Livewire\Category;

use App\Models\IgredientAPI;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class FormIngredients extends Component
{

    public $ingredient;

    protected $listeners = [
        'ingredientSerch'
    ];

    // protected $rules = [
    //     'ingredient' => ['numeric'], //"/^\\d+$/"
    // ];

    public function render()
    {
        return view('livewire.category.form-ingredients');
    }

    public function ingredientSerch($ingredient)
    {
        $this->resetValidation('ingredient');
        if ((!is_numeric($ingredient))) {
            $this->addError('ingredient', 'The type field is invalid.');
        }

        $ingredientInDatabase = IgredientAPI::where('serch', $ingredient)->get();

        if ($ingredientInDatabase->isEmpty()) {
            $ingredientResponseAPI = $this->findIngredient($ingredient);
            // dd($ingredientResponseAPI);
            if ($ingredientResponseAPI) {
                $ingredientAPI = new IgredientAPI;
                $ingredientAPI->serch = $ingredient;
                $ingredientAPI->json_response_api = $ingredientResponseAPI;
                $ingredientAPI->save();
                $this->ingredient = json_decode($ingredientResponseAPI);
            }
        } else {
            $this->ingredient = json_decode($ingredientInDatabase[0]->json_response_api);
        }
        // $this->ingredient = intval($ingredient);

        // dd($this->findIngredient($this->ingredient));
        // $this->validate();

    }

    private function findIngredient(int $idIngredient): bool|string
    {
        $url = 'https://api.spoonacular.com/food/ingredients/' . $idIngredient . '/information';

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'x-api-key' => config('app.spoon_api_key'),
        ])->get($url, [
            'unit' => 'grams'
        ]);

        dd($response);

        if ($response->failed()) {
            $this->addError('ingredient', 'API response was failed!!');
            return false;
        }

        if ($response->successful()) {
            // dd($response);
            $data = $response->json();
            dd($data);
            return json_encode($data);
        }
    }
}
