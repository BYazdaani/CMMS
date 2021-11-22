<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentAttachedFile extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function technicalFile()
    {
        return $this->belongsTo(TechnicalFile::class);
    }
}
