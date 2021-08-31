<?php

namespace Database\Factories;

use App\Enums\AssessmentTypes;
use App\Models\Assessment;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AssessmentFactory extends Factory
{
    protected $model = Assessment::class;

    public function definition(): array
    {
        $assessment_types = AssessmentTypes::toLabels();
        return [
            'name' => $this->faker->word(),
            'assessment_at' => Carbon::now()->addDays($this->faker->numberBetween(0, 90)),
            'description' => $this->faker->paragraph(),
            'total_marks' => $this->faker->numberBetween(10, 200),
            'weight' => $this->faker->numberBetween(0,100),
            'type' => $assessment_types[rand(0, 2)],
            'subject_id' => Subject::factory(),
        ];
    }
}
