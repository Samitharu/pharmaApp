<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = "suppliers";
    protected $primaryKey = "supplier_id";
    protected $fillable = [
        "supplier_code",
        "supplier_name",
        "supplier_address",
        "supplier_contact_no",
        "created_by",
        "updated_by"
    ];

    
}
