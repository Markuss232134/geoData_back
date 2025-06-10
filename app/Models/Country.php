<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'area_km2', 'population'];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
