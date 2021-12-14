<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrderLog extends Model
{
    use HasFactory;

    protected $fillable=['work_order_id','status'];

    public function workOrder()
    {
        return $this->belongsTo(WorkOrder::class);
    }
}
