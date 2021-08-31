<?php

namespace App\Http\Controllers\Api;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\QueryBuilder\QueryBuilder;

class SubjectsController extends Controller
{

    public function index(Request $request): array
    {
        return QueryBuilder::for(Subject::class)
            ->allowedFilters(['code'])
            ->get()
            ->toArray();
    }
}
