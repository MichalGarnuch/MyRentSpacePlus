<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LogEntry extends Model
{
    use HasFactory;

    protected $table = 'logs';

    protected $fillable = ['user_id', 'action', 'timestamp'];
    protected $casts = ['timestamp' => 'datetime'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
