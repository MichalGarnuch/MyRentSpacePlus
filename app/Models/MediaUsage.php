<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MediaUsage extends Model
{
    use HasFactory;

    protected $fillable = ['apartment_id', 'rental_agreement_id', 'media_type_id', 'reading_date', 'value', 'archived'];
    protected $casts = ['reading_date' => 'date', 'archived' => 'boolean'];
    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

    public function rentalAgreement()
    {
        return $this->belongsTo(RentalAgreement::class);
    }

    public function mediaType()
    {
        return $this->belongsTo(MediaType::class);
    }
}
