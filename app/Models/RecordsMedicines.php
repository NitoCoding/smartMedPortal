<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecordsMedicines extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'recordIndex',
        'medicineId',
        'kuantitas',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'recordIndex' => 'integer',
        'medicineId' => 'integer',
    ];

    public function recordIndex(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Records::class);
    }

    public function medicineId(): BelongsTo
    {
        return $this->belongsTo(Medicine::class);
    }
}
