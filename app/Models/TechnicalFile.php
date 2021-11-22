<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnicalFile extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    public function equipmentAttachedFile()
    {
        return $this->hasOne(EquipmentAttachedFile::class);
    }
}
