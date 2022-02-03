<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterventionReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'work_order_id',
        'nature',
        'observation'
    ];

    public function workOrder(){
        return $this->belongsTo(WorkOrder::class);
    }

    public function spareParts(){
        return $this->belongsToMany(
            sparePart::class,
            'intervention_report_spare_parts',
            'intervention_report_id',
            'spare_part_id')->withPivot('quantity');
    }
}
