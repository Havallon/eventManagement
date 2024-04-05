<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Batch extends Model
{
    use HasFactory, Uuid;
    protected $fillable = [
        "order",
        "expiration_date",
        "section_id",
    ];
    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    protected $casts = [
        "expiration_time"=> "date:Y-m-d",
    ];
}
