<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    use HasFactory;

    public function schedule()
    {
        return $this->hasMany(Schedule::class, 'ship_id', 'id');
    }

    public function schedule_active()
    {
        $date = date_create()->format('Y-m-d') . ' 00:00:00';
        $last_date = date('Y-m-d' . ' 23:59:59', strtotime($date . ' + 1 years'));

        $schedule_active = Schedule::where('ship_id', $this->id)
            ->whereBetween('etd', [$date, $last_date])
            ->orderBy('etd', 'asc')
            ->get();
        
        return $schedule_active;
    }
}
