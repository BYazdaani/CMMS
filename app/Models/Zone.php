<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    protected $guarded=[

    ];

    public function equipments(){
        return $this->hasMany(Equipment::class);
    }

}
