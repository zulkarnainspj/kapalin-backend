<?php

namespace App\Models\Admin;

use App\Models\Admin\Ticket;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function ticket()
    {
        return $this->hasMany(Ticket::class, 'payment_id', 'id');
    }
}
