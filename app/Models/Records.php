<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Records extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pasienId',
        'dokterId',
        'tindakan',
        'tglBerobat',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'pasienId' => 'integer',
        'dokterId' => 'integer',
        'tglBerobat' => 'timestamp',
    ];

    public function pasienId(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function dokterId(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
