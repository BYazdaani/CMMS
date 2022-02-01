<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        "admin_id","provider_id","invoice_code"
    ];

    public function spareParts()
    {
        return $this->belongsToMany(
            sparePart::class,
            'invoices_spare_parts',
            'invoice_id',
            'spare_part_id')->withPivot('quantity');
    }

    public function provider()
    {
        return $this->belongsTo(provider::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

}
