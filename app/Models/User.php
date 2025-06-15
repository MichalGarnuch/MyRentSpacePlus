<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail; // Możesz odkomentować, jeśli chcesz weryfikację email
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Tenant;
use App\Models\Owner;
use App\Models\LogEntry;
use App\Models\Notification;
use App\Models\Report;
use App\Models\Review;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username', // DODANE: bo masz to w migracji
        'role',     // DODANE: bo masz to w migracji
        'related_id', // DODANE: bo masz to w migracji
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        // 'username', // Możesz dodać, jeśli nie chcesz, aby username było widoczne w serializacji
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => 'string', // Możesz dodać typowanie dla roli jeśli chcesz, np. 'string'
        ];
    }

    /**
     * Relacje użytkownika
     */
    public function tenant()
    {
        // Jeśli related_id jest polimorficzne (tenant LUB owner), to ta relacja będzie bardziej złożona.
        // Jeśli chcesz to uprościć, możesz mieć osobne kolumny tenant_id i owner_id.
        // Na razie zostawiam, ale pamiętaj o jej złożoności w kontekście related_id.
        return $this->belongsTo(Tenant::class, 'related_id');
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'related_id');
    }

    public function logs()
    {
        return $this->hasMany(LogEntry::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
