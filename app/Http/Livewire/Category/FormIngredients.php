<?php

namespace App\Http\Livewire\Category;

use App\Models\IngredientAPI;
use App\Models\UserIngredient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class FormIngredients extends Component
{

    public $ingredient;
    public $weight;
    public $unit;

    protected $rules = [
        // 'ingredient_a_p_i_id' => ['required', 'exists:App\IngredientAPI,serch'],
        'weight' => ['required', 'numeric', 'min:0'],
        'unit' => ['required', 'string', 'max:20'],
    ];

    protected $listeners = [
        'ingredientSerch',
        'saveIngredient'
    ];

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

        $ingredientInDatabase = IngredientAPI::where('serch', $ingredient)->get();

        if ($ingredientInDatabase->isEmpty()) {
            $ingredientResponseAPI = $this->findIngredient($ingredient);
            // dd($ingredientResponseAPI);
            if ($ingredientResponseAPI) {
                $ingredientAPI = new IngredientAPI;
                $ingredientAPI->serch = $ingredient;
                $ingredientAPI->json_response_api = $ingredientResponseAPI;
                $ingredientAPI->save();
                $this->ingredient = json_decode($ingredientResponseAPI, true);
                // dd($this->ingredient);
            }
        } else {
            // dd($ingredientInDatabase[0]->json_response_api);
            $this->ingredient = $ingredientInDatabase[0]->json_response_api;
            $userIngredient = UserIngredient::where('user_id', Auth::user()->id)->where('ingredient_a_p_i_id',  $this->ingredient['id'])->get();
            if (!$userIngredient->isEmpty()) {
                $this->weight = $userIngredient[0]->weight;
                $this->unit = $userIngredient[0]->unit;
            } else {
                $this->weight = 0;
                $this->unit = null;
            }
            // dd(!$userIngredient->isEmpty());
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
            // 'unit' => 'grams'
        ]);

        // dd(json_decode($response->body()));

        if ($response->failed()) {
            $message = match ($response->status()) {
                '400' => 'API response was failed!!',
                '401' => 'API unauthorized!!',
                '429' => 'API to many request!!',
                '500' => 'API server not respond!!',
                default => 'API unknow error!!'
            };
            $this->addError('ingredient', $message);
            return false;
        }

        if ($response->successful()) {
            // dd($response);
            $data = $response->json();
            // return json_encode($response->body());
            // dd($data);
            return json_encode($data);
        }
    }

    public function saveIngredient()
    {

        $this->validate();

        $userIngredient = UserIngredient::where('user_id', Auth::user()->id)->where('ingredient_a_p_i_id',  $this->ingredient['id'])->get();

        if ($userIngredient->isEmpty()) {
            $userIngredient = new UserIngredient();
            $userIngredient->user_id = Auth::user()->id;
            $userIngredient->ingredient_a_p_i_id = $this->ingredient['id'];
            $userIngredient->weight = $this->weight;
            $userIngredient->unit = $this->unit;
            $userIngredient->save();
        } else {
            $userIngredient[0]->weight = $this->weight;
            $userIngredient[0]->unit = $this->unit;
            $userIngredient[0]->save();
        }
    }
}
