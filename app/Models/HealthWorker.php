<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HealthWorker extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'age', 'sex', 
        'date_of_birth', 'contact_number', 
        'position', 'work_experience'
    ];

    public function medical_records() : HasMany
    {
        return $this->hasMany(MedicalRecord::class);
    }

    public function medical_equipments() : HasMany
    {
        return $this->hasMany(MedicalEquipment::class);
    }
}
