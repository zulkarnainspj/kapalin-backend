<?php

namespace App\Models\Admin;

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

    public function schedule()
    {
        return $this->hasOne(Schedule::class, 'route_id', 'id');
    }

    public function getPort()
    {
        return Port::findOrFail($this->port_id);
    }

    public function getNextPort()
    {
        return Port::findOrFail($this->next_port_id);
    }

    public function checkSchedule()
    {
        $check = Schedule::where('route_id', $this->id)->count();

        return $check;
    }
}
