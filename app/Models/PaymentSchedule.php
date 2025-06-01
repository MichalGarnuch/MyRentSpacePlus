<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentSchedule extends Model
{
    use HasFactory;

    protected $fillable = ['rental_agreement_id', 'due_date', 'amount', 'status'];
    protected $casts = ['due_date' => 'date'];
    public function rentalAgreement()
    {
        return $this->belongsTo(RentalAgreement::class);
    }
}
