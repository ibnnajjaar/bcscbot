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
        $period_groups = Period::query()
            ->with('subject')
            ->orderBy('start_at')
            ->get()
            ->groupBy('weekday');

        $active_group = $period_groups->filter(function ($period_group, $key) use ($today) {
            return $today == $key;
        });

        $inactive_group = $period_groups->filter(function ($period_group, $key) use ($today) {
            return $today != $key;
        });

        /**
         * Reorder the collection as per week day order
         */
        $ordered_inactive_group = collect();

        $template = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];

        foreach ($template as $day) {

            $group = $inactive_group->filter(function ($group, $key) use ($day) {
                return $day == $key;
            });

            if ($group->isNotEmpty()) {
                $ordered_inactive_group = $ordered_inactive_group->concat([$day => $group]);
            }

        }

        return view('welcome', compact('active_group', 'ordered_inactive_group'));
    }
}
