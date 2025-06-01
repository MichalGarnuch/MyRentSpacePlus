<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['tenant_id', 'apartment_id', 'rating', 'comment'];
    protected $casts = ['created_at' => 'datetime'];
    public function rentalAgreement()
    {
        return $this->belongsTo(RentalAgreement::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}
