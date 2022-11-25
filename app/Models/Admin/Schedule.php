<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    public function route()
    {
        return $this->belongsTo(Route::class, 'route_id');
    }

    public function ship()
    {
        return $this->belongsTo(Ship::class, 'ship_id');
    }
    
    public function pCount()
    {
        $person = Ticket::where('schedule_id', $this->id)->count();

        return $person;
    }
}
