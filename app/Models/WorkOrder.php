<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'work_order_id',
        'maintenance_technician_id',
        'work_request_id',
        'type',
        'description',
        'date',
        'hour',
        'admin_id'
    ];

    public function workRequest()
    {
        return $this->belongsTo(WorkRequest::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function maintenanceTechnician()
    {
        return $this->belongsTo(MaintenanceTechnician::class);
    }

    public function  workOrderLogs(){
        return $this->hasMany(WorkOrderLog::class);
    }
}
