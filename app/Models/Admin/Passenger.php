<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;

    public function ticket()
    {
        return $this->hasOne(Ticket::class, 'passenger_id');
    }
}
