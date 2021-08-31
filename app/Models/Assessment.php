<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Assessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'assessment_at',
        'description',
        'total_marks',
        'weight',
        'type'
    ];

    protected $dates = [
        'assessment_at',
    ];

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function getFormattedTypeAttribute(): string
    {
        return Str::title($this->type);
    }
}
