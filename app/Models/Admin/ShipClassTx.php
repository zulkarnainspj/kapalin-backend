<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipClassTx extends Model
{
    use HasFactory;

    protected $table = 'ship_classes';

    public function ship()
    {
        return $this->belongsToMany(Ship::class, 'ship_id', 'id');
    }

    public function classes()
    {
        return $this->belongsTo(ShipClass::class, 'class_id', 'id');
    }
}
