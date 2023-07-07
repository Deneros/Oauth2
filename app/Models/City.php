<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function formDatasOfBirth()
    {
        return $this->hasMany(FormData::class, 'city_of_birth_id');
    }

    public function formDatasOfResidence()
    {
        return $this->hasMany(FormData::class, 'place_of_residence_id');
    }
}
