<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = "sizes";

    protected $fillable = [
        'name', 'created_at', 'updated_at','deleted_at',
    ];
}
