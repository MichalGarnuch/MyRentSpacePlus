<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MaintenanceRequest extends Model
{
    use HasFactory;

    protected $fillable = ['apartment_id', 'description', 'status', 'requested_at', 'resolved_at'];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}
