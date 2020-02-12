<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = "colors";

    protected $fillable = [
        'name', 'created_at', 'updated_at','deleted_at',
    ];
}
