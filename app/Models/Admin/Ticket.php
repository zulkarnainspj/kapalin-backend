<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }
}
