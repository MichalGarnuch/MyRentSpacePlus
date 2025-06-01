<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RentPayment extends Model
{
    use HasFactory;

    protected $fillable = ['rental_agreement_id', 'payment_date', 'amount', 'method', 'notes'];
    protected $casts = ['payment_date' => 'date'];
    public function rentalAgreement()
    {
        return $this->belongsTo(RentalAgreement::class);
    }
}
