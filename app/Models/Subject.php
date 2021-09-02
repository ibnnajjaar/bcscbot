<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'lecturer',
        'description'
    ];

    public function periods(): HasMany
    {
        return $this->hasMany(Period::class);
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

    public function getFormattedNameAttribute()
    {
        return __(':name (:code)', ['name' => $this->name, 'code' => $this->code]);
    }

}
