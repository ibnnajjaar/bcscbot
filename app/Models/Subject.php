<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'lecturer',
    ];

    public function classes()
    {
        //
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



}
