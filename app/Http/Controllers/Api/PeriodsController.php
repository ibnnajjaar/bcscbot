<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Period;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class PeriodsController extends Controller
{
    public function index(Request $request): array
    {
        return QueryBuilder::for(Period::class)
            ->allowedFilters(['id', 'subject_id'])
            ->allowedIncludes(['subject'])
            ->get()
            ->toArray();
    }
}
