<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Los atributos que son asignables masivamente.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // RELACIONES (La clave de la arquitectura profesional)

    /**
     * Relación con el perfil de Médico.
     * Un usuario TIENE UN perfil de doctor.
     */
    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    /**
     * Relación con el perfil de Paciente (A implementar luego).
     */
    public function patient()
    {
        return $this->hasOne(Patient::class);
    }
}