<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommissionLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'rental_agreement_id',
        'commission_amount',
        'payment_date',
    ];

    // Rzutowanie payment_date na obiekt Carbon (opcjonalne, ale zalecane)
    protected $casts = [
        'payment_date' => 'date',
    ];

    public function rentalAgreement()
    {
        return $this->belongsTo(RentalAgreement::class);
    }
}
