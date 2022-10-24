<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carts extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'order_id',
        'qty',
        'total',
        'option',
        'outOfStock',
        'status',
    ];

    protected $primaryKey = 'cart_id';
    public function users(){

    	$this->belongsTo('app\Models\users');
    }

   

}
