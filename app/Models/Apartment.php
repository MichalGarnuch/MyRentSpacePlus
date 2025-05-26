<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Apartment extends Model {
    use HasFactory;
    public function building() {
        return $this->belongsTo(Building::class);
    }
}
