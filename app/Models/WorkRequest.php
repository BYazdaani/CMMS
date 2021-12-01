<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkRequest extends Model
{
    use HasFactory;

    protected $fillable=["user_id","equipment_id",'description', "date", 'hour', 'priority', 'lot'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function equipment(){
        return $this->belongsTo(Equipment::class);
    }
}
