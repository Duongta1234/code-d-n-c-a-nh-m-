<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InterviewResult>
 */
class InterviewResultFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'candidate_id'=>fake()->numberBetween(1,10),
            'interview_schedule_id'=>fake()->numberBetween(1,10),
            'result_interview'=>'pass',
            'note'=>fake()->text(30),
        ];
    }
}
