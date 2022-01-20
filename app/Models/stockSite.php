<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stockSite extends Model
{
    use HasFactory;

    protected $fillable=[
      "designation"
    ];

    public function spareParts(){
        return $this->hasMany(sparePart::class);
    }

}
