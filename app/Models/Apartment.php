<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Apartment extends Model {
    use HasFactory;
    protected $fillable = ['building_id', 'number', 'floor', 'area'];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function rentalAgreements()
    {
        return $this->hasMany(RentalAgreement::class);
    }

    public function maintenanceRequests()
    {
        return $this->hasMany(MaintenanceRequest::class);
    }

    public function mediaUsages()
    {
        return $this->hasMany(MediaUsage::class);
    }
}
