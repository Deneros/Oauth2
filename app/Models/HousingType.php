<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HousingType extends Model
{
    use HasFactory;

    protected $table = 'housing_types';

    protected $fillable = [
        'name'
    ];

    public $timestamps = false;

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
