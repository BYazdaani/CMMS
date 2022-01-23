<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class provider extends Model
{
    use HasFactory;

    protected $fillable=[
      "name","phone_number","email","information"
    ];

    public function invoices(){
        return $this->hasMany(invoice::class);
    }

}
