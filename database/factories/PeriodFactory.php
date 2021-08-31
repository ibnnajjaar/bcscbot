<?php

namespace Database\Factories;

use App\Models\Period;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PeriodFactory extends Factory
{
    protected $model = Period::class;

    public function definition(): array
    {
        return [
            'start_at' => $this->faker->time('H:i:s'),
            'end_at' => $this->faker->time('H:i:s'),
            'weekday' => strtolower(Carbon::now()->format('l')),
            'details' => $this->faker->paragraph(),
            'subject_id' => Subject::factory(),
        ];
    }
}
