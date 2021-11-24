<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnicalFile extends Model
{
    use HasFactory;

    protected $fillable=[
        "picture", "electrical_schema", "plan", "power", "frequency", "electric_power", "voltage", "weight", "capacity", "compressed_air_pressure", "start", "length", "width", "height",
        "description", "special_tools", "manufacturer", "address", "phone_number", "email", "cost", "date_of_manufacture", "date_of_purchase", "installation_date", "commissioning_date"
    ];

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    public function equipmentAttachedFile()
    {
        return $this->hasOne(EquipmentAttachedFile::class);
    }
}
