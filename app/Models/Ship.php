<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    use HasFactory;

    public function schedule()
    {
        return $this->hasMany(Schedule::class, 'ship_id', 'id');
    }
}
