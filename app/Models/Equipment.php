<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable=[
        "name", "code", "serial_number", "model", "zone_id", "department_id"
    ];

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function technicalFile()
    {
        return $this->hasOne(TechnicalFile::class);
    }

}
