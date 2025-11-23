<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    protected $casts = [
        'date' => 'date',
        'time' => 'datetime:H:i',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function setDate(string $date)
    {
        $this->date = \DateTimeImmutable::createFromFormat('d/m/Y', $date);
    }

    public function setTime(string $time)
    {
        $this->date = \DateTimeImmutable::createFromFormat('H:i', $time);
    }
}
