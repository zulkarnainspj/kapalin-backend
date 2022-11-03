<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Port extends Model
{
    use HasFactory;

    public function route()
    {
        return $this->hasOne(Route::class, 'port_id', 'id');
    }

    public function next_route()
    {
        return $this->hasOne(Route::class, 'next_port_id', 'id');
    }
}
