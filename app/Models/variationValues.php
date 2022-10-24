<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class variationValues extends Model
{
    protected $fillable = [
        'value',
        'variation_name',
        'product_id',
        'stock'



    ];
    use HasFactory;
}
