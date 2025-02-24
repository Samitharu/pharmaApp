<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_code',
        'product_name',
        'supplier_id',
        'pack_size',
        'generic_name',
        'description',
        'status',
        'barcode',
        'free_offer_allowed',
        'discount_allowed',
        'manage_batch',
        'whole_sale_price',
        'retail_price',
        'purchase_price',
        'created_by',
        'updated_by',
    ];
    protected $primaryKey = 'product_id';
    protected $table = 'products';
}
