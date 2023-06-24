<?php

namespace App\Http\Livewire\Category;

use App\Models\CategoryAPI;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SerchIngredients extends Component
{
    public $results;
    // public $serch;
    public $numOfResults = 100;
    // public $ingredient;

    protected $listeners = ['serch',];

    public function render()
    {
        return view('livewire.category.serch-ingredients');
    }

    public function mount()
    {
        // $this->message = 'test2';
    }

    public function serch(string $name_en)
    {
        $serchAPI = CategoryAPI::where('serch', $name_en)->get();
        // dd($serchAPI);
        if ($serchAPI->isEmpty()) {
            $response = $this->findIngrediants($name_en);
            if ($response) {
                $categoryAPI = new CategoryAPI;
                $categoryAPI->serch = $name_en;
                $categoryAPI->json_response_api = $response;
                $categoryAPI->save();
                $this->results = json_decode($response);
            }
        } else {
            // dd($serchAPI[0]->json_response_api);
            $this->results = json_decode($serchAPI[0]->json_response_api);
        }
    }

    private function findIngrediants(string $name_en): bool|string
    {
        $response = Http::withHeaders([
            'x-api-key' => config('app.spoon_api_key'),
        ])->get('https://api.spoonacular.com/food/ingredients/search', [
            'query' => $name_en,
            'number' => $this->numOfResults,
        ]);

        if ($response->failed()) {
            $this->results = 'Something went wrong!!';
            return false;
        }

        if ($response->successful()) {
            $test = $response->json('results');
            return json_encode($test);
        }
        // return $dataAPI;
        // $results = $response->json('results');
        // return
        // dump(json_encode($test));
        // $this->results = $response->collect()['results'];
    }

    // public function updatingIngredient($id)
    // {
    //     $this->ingredient = intval($id);
    // }

    // function updating() {

    // }

    // public function loadIngredient(int $id)
    // {
    //     $this->ingredient = $id;
    // }
}
