<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommissionLog extends Model
{
    use HasFactory;

    public function rentalAgreement()
    {
        return $this->belongsTo(RentalAgreement::class);
    }
}
