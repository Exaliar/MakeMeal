<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IgredientAPI extends Model
{
    use HasFactory;

    protected $fillable = [
        'serch',
        'json_response_api',
    ];
}
