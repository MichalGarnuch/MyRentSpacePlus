<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Owner extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone'];

    public function rentalAgreements()
    {
        return $this->hasMany(RentalAgreement::class);
    }

    public function user()
    {
        return $this->hasOne(User::class, 'related_id');
    }
}
