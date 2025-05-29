<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MediaType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function mediaUsages()
    {
        return $this->hasMany(MediaUsage::class);
    }
}
