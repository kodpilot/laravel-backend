<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'pay_status',
        'cargo_id',
        'payment_id',
        'details',
        'total',
        'address_id'
    ];

    public function users(){

    	$this->belongsToMany('app\Models\users');
    }
}
