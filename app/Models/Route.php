<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    public function port()
    {
        return $this->belongsTo(Port::class, 'port_id');
    }

    public function next_port()
    {
        return $this->belongsTo(Port::class, 'next_port_id');
    }
}
