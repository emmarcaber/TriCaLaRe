<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id', 'health_worker_id', 'date_of_consultation',
        'reason_for_consultation', 'diagnosis', 'prescription',
        'follow_up_appointment'
    ];

    public function patient() : BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function health_worker() : BelongsTo
    {
        return $this->belongsTo(HealthWorker::class);
    }

}
