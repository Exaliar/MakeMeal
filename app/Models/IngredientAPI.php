<?php

namespace App\Models;

use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientAPI extends Model
{
    use HasFactory;

    protected $fillable = [
        'serch',
        'json_response_api',
    ];

    // protected $primaryKey = 'serch';

    public function userIngredient()
    {
        return $this->hasMany(UserIngredient::class);
    }

    protected function jsonResponseApi(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => json_decode($value, true),
        );
    }
}
