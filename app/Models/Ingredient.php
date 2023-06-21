<?php

namespace App\Models;

use App\Models\User;
use App\Models\Measurement;
use App\Models\IngredientType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ingredient_type_id',
        'user_id'
    ];

    public function measurements()
    {
        return $this->belongsToMany(Measurement::class)->withTimestamps();
    }

    public function ingredientType()
    {
        return $this->belongsTo(IngredientType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
