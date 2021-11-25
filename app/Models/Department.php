<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable=[
      "designation"
    ];

    public function user(){
        return $this->hasMany(User::class);
    }

    public function equipments(){
        return $this->hasMany(Equipment::class);
    }

}
