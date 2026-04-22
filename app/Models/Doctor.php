<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; // Cambiamos Authenticatable por Model
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'last_name', 
        'matricula', 
        'specialty_id'
    ];

    // =========================================================
    // RELACIONES
    // =========================================================

    /**
     * Relación con el Usuario (La cuenta de acceso).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación con la Especialidad.
     */
    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }
}