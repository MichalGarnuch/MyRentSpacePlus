<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RentPayment extends Model
{
    use HasFactory;

    protected $fillable = ['rental_agreement_id', 'payment_date', 'amount', 'method', 'notes'];

    public function rentalAgreement()
    {
        return $this->belongsTo(RentalAgreement::class);
    }
}
