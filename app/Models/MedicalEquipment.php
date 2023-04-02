<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MedicalEquipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'brand', 'model',
        'quantity', 'health_worker_id'
    ];

    public function medical_equipment() : BelongsTo
    {
        return $this->belongsTo(HealthWorker::class);
    }
}
