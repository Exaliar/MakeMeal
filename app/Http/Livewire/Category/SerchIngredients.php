<?php

namespace App\Http\Livewire\Category;

use App\Models\CategoryAPI;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SerchIngredients extends Component
{
    public $results;
    public $numOfResults = 100;

    protected $listeners = ['serch',];

    public function render()
    {
        return view('livewire.category.serch-ingredients');
    }

    public function serch(string $name_en)
    {
        $serchAPI = CategoryAPI::where('serch', $name_en)->get();
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
            $test = $response->json('results');
            return json_encode($test);
        }
    }
}
