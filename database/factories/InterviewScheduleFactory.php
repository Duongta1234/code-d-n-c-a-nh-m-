<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InterviewSchedule>
 */
class InterviewScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>fake()->numberBetween(1,10),
            'candidate_id'=>fake()->numberBetween(1,10),
            'interview_time'=>fake()->dateTime,
            'interview_location'=>fake()->address,
            'job_position'=>fake()->name,
            'status'=>fake()->numberBetween(0,2),
        ];
    }
}
