<?php

namespace Database\Factories;
use App\Models\Salary;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Salary>
 */
class SalaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'basic_salary_id' => $this->faker->unique()->numberBetween(1, 10),
            'allowed_leave_days' => $this->faker->numberBetween(2, 5),
            'absent_days' => $this->faker->numberBetween(0, 5), // Generate a random number between 0 and 5
            'deducted_salary' => $this->faker->numberBetween(0, 10000), // Adjust the range as needed
            'final_salary' => $this->faker->numberBetween(5000000, 15000000), // Adjust the range as needed
            // Thêm các trường khác nếu cần
        ];

    }
}
