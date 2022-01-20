<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sparePartCategory extends Model
{
    use HasFactory;

    protected $fillable=[
      "tag"
    ];

    public function spareParts(){
        return $this->hasMany(sparePart::class);
    }
}
