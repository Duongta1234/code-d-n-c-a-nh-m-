<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name'=>fake()->name(),
            'last_name'=>fake()->name(),
            'date_of_birth'=>fake()->date,
            'gender'=>fake()->numberBetween(0,1),
            'phone_number'=>fake()->phoneNumber,
            'image'=> 'anh.jpg',
            'card_id'=>fake()->numberBetween(1,10),
            'origin'=>'Số 1,ngõ 1-Phường Phúc Xá-Quận Ba Đình-Thành phố Hà Nội',
            'address'=>'Số 1,ngõ 1-Phường Phúc Xá-Quận Ba Đình-Thành phố Hà Nội',
            'user_id'=>fake()->unique()->numberBetween(1,10),
            'religion_id'=>fake()->numberBetween(1,10),
            'nationality_id'=>fake()->numberBetween(1,200),
            'ethnicity_id'=>fake()->numberBetween(1,10),
            'level_id'=>fake()->numberBetween(1,10),
            'position_id'=>fake()->numberBetween(1,10),
        ];
    }
}
