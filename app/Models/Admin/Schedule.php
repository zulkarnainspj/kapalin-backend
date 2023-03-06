<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        $person = Ticket::where('schedule_id', $this->id)->whereRaw('status IN (1,4)')->count();

        return $person;
    }

    public function ticket()
    {
        return $this->hasOne(Ticket::class, 'schedule_id');
    }

    public function getRoute()
    {
        return Route::findOrFail('id', $this->route_id);
    }

    public function capacity()
    {
        $cpty = ShipClass::where('name', $this->kelas)->first();
        $ship_cpty = ShipClassTx::where('class_id', $cpty->id)->where('ship_id', $this->ship->id)->first();
        return $ship_cpty;
    }

    public function psg_count()
    {
        $psg_count = Schedule::select(DB::raw('sum(passengers) as total'))->where('route_id', $this->route_id)->where('eta', $this->eta)->first();
        return $psg_count->total;
    }
}
