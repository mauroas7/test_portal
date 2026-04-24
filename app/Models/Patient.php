<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'dni',
        'phone',
        'gender',
        'birth_date',
        'health_insurance',
        'health_plan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}