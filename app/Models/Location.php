<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model {
    use HasFactory;
    public function buildings() {
        return $this->hasMany(Building::class);
    }
}
