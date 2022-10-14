<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Port extends Model
{
    use HasFactory;

    public function route()
    {
        return $this->hasMany(Route::class, 'port_id', 'id');
    }

    public function next_route()
    {
        return $this->hasMany(Route::class, 'next_port_id', 'id');
    }
}
