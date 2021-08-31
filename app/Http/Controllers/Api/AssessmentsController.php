<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class AssessmentsController extends Controller
{
    public function index(Request $request): array
    {
        return QueryBuilder::for(Assessment::class)
            ->allowedFilters(['id', 'subject_id', 'type'])
            ->allowedIncludes(['subject'])
            ->get()
            ->toArray();
    }
}
