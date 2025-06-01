<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RentalAgreement extends Model
{
    use HasFactory;

    protected $fillable = [
        'apartment_id',
        'tenant_id',
        'owner_id',
        'start_date',
        'end_date',
        'rent_amount',
        'owner_rent',
        'media_advance',
        'company_commission',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function commissionLogs()
    {
        return $this->hasMany(CommissionLog::class);
    }

    public function paymentSchedules()
    {
        return $this->hasMany(PaymentSchedule::class);
    }

    public function rentPayments()
    {
        return $this->hasMany(RentPayment::class);
    }

    public function mediaUsages()
    {
        return $this->hasMany(MediaUsage::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
