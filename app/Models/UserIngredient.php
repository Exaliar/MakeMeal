<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserIngredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ingredient_a_p_i_id',
        'weight',
        'unit',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ingredientAPI()
    {
        return $this->belongsTo(IngredientAPI::class, 'ingredient_a_p_i_id', 'serch');
    }
}
