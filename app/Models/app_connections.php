<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class app_connections extends Model
{
    use HasFactory;
    protected $casts = [
        'created_at' => 'datetime:d.m.Y H:i:s',
        'updated_at' => 'datetime:d.m.Y H:i:s',
        'date' => 'datetime:d.m.Y H:i:s',
        'start_date' => 'datetime:d.m.Y H:i:s',
        'end_date' => 'datetime:d.m.Y H:i:s',
    ];
}
