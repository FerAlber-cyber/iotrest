<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $fillable = [
        'id','name', 'type','rol', 'value', 'date', 'user_id'
    ];
}
