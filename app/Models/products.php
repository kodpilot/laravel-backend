<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

     protected $fillable = [
        'file',
        'name',
        'nameEn',
        'description',
        'descriptionEn',
        'text',
        'textEn',
        'slug',
        'order',
        'status',
    ];
     public function carts(){

    	$this->belongsToMany('app\Models\carts');
    }


}
