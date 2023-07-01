<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public $timestamps = false;

    public function formDatas()
    {
        return $this->belongsToMany(FormData::class);
    }
}
