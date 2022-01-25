<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sparePart extends Model
{
    use HasFactory;

    protected $fillable = [
        "stock_site_id", "spare_part_category_id", "code", "init_stock", "actual_stock", "alert_threshold", "description", 'observation','unite_price'
    ];

    public function sparePartCategory()
    {
        return $this->belongsTo(sparePartCategory::class);
    }

    public function stockSite()
    {
        return $this->belongsTo(stockSite::class);
    }

    public function invoices(){
        return $this->belongsToMany(
            invoice::class,
            'invoices_spare_parts',
            'invoice_id',
            'spare_part_id')->withPivot('quantity','product_price');
    }

}
