<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ShipClass extends Model
{
    use HasFactory;

    protected $table = 'classes';

    public function ship_class()
    {
        return $this->hasMany(ShipClassTx::class, 'class_id', 'id');
    }
}
