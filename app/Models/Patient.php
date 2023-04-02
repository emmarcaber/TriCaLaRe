<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
            'name', 'age', 'sex', 
            'date_of_birth', 'contact_number', 'medical_history', 
            'allergies'
        ];

    public function medical_records() : HasMany
    {
        return $this->hasMany(MedicalRecord::class);
    }
}
