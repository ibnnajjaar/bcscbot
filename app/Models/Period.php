<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Period extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_at',
        'end_at',
        'weekday',
        'location',
        'details',
    ];

    protected $casts = [
        'start_at' => 'datetime:H:i',
        'end_at' => 'datetime:H:i',
    ];

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function scopeSearch($query, $search)
    {
        $search_term = $search . '%';
        $query->where('name', 'like', $search_term)
            ->orWhere('code', 'like', $search_term);
    }

    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = strtoupper($value);
    }

    public function getStartAtAttribute($value): string
    {
        return Carbon::parse($value)->format('H:i:s');
    }

    public function getEndAtAttribute($value): string
    {
        return Carbon::parse($value)->format('H:i:s');
    }

    public function getStartAtHrAttribute(): string
    {
        return Carbon::parse($this->start_at)->format('H');
    }

    public function getStartAtMinAttribute(): string
    {
        return Carbon::parse($this->start_at)->format('i');
    }

    public function getEndAtHrAttribute(): string
    {
        return Carbon::parse($this->end_at)->format('H');
    }

    public function getEndAtMinAttribute(): string
    {
        return Carbon::parse($this->end_at)->format('i');
    }

    public function getFormattedStartAtAttribute(): string
    {
        return Carbon::parse($this->start_at)->format('H:i');
    }

    public function getFormattedEndAtAttribute(): string
    {
        return Carbon::parse($this->end_at)->format('H:i');
    }
}
