<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Building extends Model {
    use HasFactory;
    protected $fillable = ['location_id', 'name', 'address'];
    public function location() {
        return $this->belongsTo(Location::class);
    }
    public function apartments() {
        return $this->hasMany(Apartment::class);
    }
}
