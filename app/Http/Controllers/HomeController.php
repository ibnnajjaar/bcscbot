<?php

namespace App\Http\Controllers;

use App\Models\Period;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{

    public function __invoke(Request $request)
    {
        $today = strtolower(Carbon::now()->format('l'));
        $period_groups = Period::query()->with('subject')->get()->groupBy('weekday');

        $active_group = $period_groups->filter(function ($period_group, $key) use ($today) {
            return $today == $key;
        });

        $inactive_group = $period_groups->filter(function ($period_group, $key) use ($today) {
            return $today != $key;
        });

        return view('welcome', compact('active_group', 'inactive_group'));
    }
}
