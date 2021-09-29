<?php

namespace App\Actions;


use App\Enums\AssessmentTypes;
use App\Models\Assessment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class CountStuff
{

    private Carbon $semester_started_at;

    public function __construct()
    {
        $this->semester_started_at = Carbon::parse(config('defaults.semester_started_at'));
    }

    public function week(): int
    {
        return now()->diffInWeeks($this->semester_started_at) + 1;
    }

    public function tutorials(): int
    {
        return Assessment::query()->where('type', AssessmentTypes::tutorial())->count();
    }

    public function assignments(): int
    {
        return Assessment::query()->where('type', AssessmentTypes::assignment())->count();
    }

    public function exams(): int
    {
        return Assessment::query()->where('type', AssessmentTypes::exam())->count();
    }
}
