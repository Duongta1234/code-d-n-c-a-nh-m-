<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = [
            [
                'first_name' => 'Nguyễn',
                'last_name' => 'Dương',
                'date_of_birth' => fake()->date,
                'gender' => 'Nam',
                'phone_number' => '0938492384',
                'image' => 'anh1.jpg',
                'card_id' => 1,
                'origin' => 'Số 1,ngõ 1-Phường Phúc Xá-Quận Ba Đình-Thành phố Hà Nội',
                'address' => 'Số 1,ngõ 1-Phường Phúc Xá-Quận Ba Đình-Thành phố Hà Nội',
                'user_id' => 1,
                'religion_id' => fake()->numberBetween(1, 3),
                'nationality_id' => 1,
                'ethnicity_id' => fake()->numberBetween(1, 4),
                'level_id' => fake()->numberBetween(1, 3),
                'position_id' => fake()->numberBetween(1, 10),
            ],
            [
                'first_name' => 'Trần',
                'last_name' => 'Dương',
                'date_of_birth' => fake()->date,
                'gender' => 'Nam',
                'phone_number' => '0938492382',
                'image' => 'anh2.jpg',
                'card_id' => 2,
                'origin' => 'Số 1,ngõ 1-Phường Phúc Xá-Quận Ba Đình-Thành phố Hà Nội',
                'address' => 'Số 1,ngõ 1-Phường Phúc Xá-Quận Ba Đình-Thành phố Hà Nội',
                'user_id' => 2,
                'religion_id' => fake()->numberBetween(1, 3),
                'nationality_id' => 1,
                'ethnicity_id' => fake()->numberBetween(1, 4),
                'level_id' => fake()->numberBetween(1, 3),
                'position_id' => fake()->numberBetween(1, 10),
            ],
            [
                'first_name' => 'Nguyễn',
                'last_name' => 'Hằng',
                'date_of_birth' => fake()->date,
                'gender' => 'Nữ',
                'phone_number' => '0938492383',
                'image' => 'anh3.jpg',
                'card_id' => 3,
                'origin' => 'Số 1,ngõ 1-Phường Phúc Xá-Quận Ba Đình-Thành phố Hà Nội',
                'address' => 'Số 1,ngõ 1-Phường Phúc Xá-Quận Ba Đình-Thành phố Hà Nội',
                'user_id' => 3,
                'religion_id' => fake()->numberBetween(1, 3),
                'nationality_id' => 1,
                'ethnicity_id' => fake()->numberBetween(1, 4),
                'level_id' => fake()->numberBetween(1, 3),
                'position_id' => fake()->numberBetween(1, 10),
            ],
            [
                'first_name' => 'Nguyễn',
                'last_name' => 'Trọng',
                'date_of_birth' => fake()->date,
                'gender' => 'Nam',
                'phone_number' => '0938492344',
                'image' => 'anh4.jpg',
                'card_id' => 4,
                'origin' => 'Số 4,ngõ 1-Phường Phúc Xá-Quận Ba Đình-Thành phố Hà Nội',
                'address' => 'Số 4,ngõ 1-Phường Phúc Xá-Quận Ba Đình-Thành phố Hà Nội',
                'user_id' => 4,
                'religion_id' => fake()->numberBetween(1, 3),
                'nationality_id' => 1,
                'ethnicity_id' => fake()->numberBetween(1, 4),
                'level_id' => fake()->numberBetween(1, 3),
                'position_id' => fake()->numberBetween(1, 10),
            ],
            [
                'first_name' => 'Tạ',
                'last_name' => 'Hào',
                'date_of_birth' => fake()->date,
                'gender' => 'Nam',
                'phone_number' => '0938492385',
                'image' => 'anh5.jpg',
                'card_id' => 5,
                'origin' => 'Số 1,ngõ 1-Phường Phúc Xá-Quận Ba Đình-Thành phố Hà Nội',
                'address' => 'Số 1,ngõ 1-Phường Phúc Xá-Quận Ba Đình-Thành phố Hà Nội',
                'user_id' => 5,
                'religion_id' => fake()->numberBetween(1, 3),
                'nationality_id' => 1,
                'ethnicity_id' => fake()->numberBetween(1, 4),
                'level_id' => fake()->numberBetween(1, 3),
                'position_id' => fake()->numberBetween(1, 10),
            ],
            [
                'first_name' => 'Tạ',
                'last_name' => 'Hậu',
                'date_of_birth' => fake()->date,
                'gender' => 'Nữ',
                'phone_number' => '0938492386',
                'image' => 'anh6.jpg',
                'card_id' => 6,
                'origin' => 'Số 1,ngõ 1-Phường Phúc Xá-Quận Ba Đình-Thành phố Hà Nội',
                'address' => 'Số 1,ngõ 1-Phường Phúc Xá-Quận Ba Đình-Thành phố Hà Nội',
                'user_id' => 6,
                'religion_id' => fake()->numberBetween(1, 3),
                'nationality_id' => 1,
                'ethnicity_id' => fake()->numberBetween(1, 4),
                'level_id' => fake()->numberBetween(1, 3),
                'position_id' => fake()->numberBetween(1, 10),

            ],
            [
                'first_name' => 'Trần',
                'last_name' => 'Kim',
                'date_of_birth' => fake()->date,
                'gender' => 'Nữ',
                'phone_number' => '0938492387',
                'image' => 'anh7.jpg',
                'card_id' => 7,
                'origin' => 'Số 1,ngõ 1-Phường Phúc Xá-Quận Ba Đình-Thành phố Hà Nội',
                'address' => 'Số 1,ngõ 1-Phường Phúc Xá-Quận Ba Đình-Thành phố Hà Nội',
                'user_id' => 7,
                'religion_id' => fake()->numberBetween(1, 3),
                'nationality_id' => 1,
                'ethnicity_id' => fake()->numberBetween(1, 4),
                'level_id' => fake()->numberBetween(1, 3),
                'position_id' => fake()->numberBetween(1, 10),
            ],
            [
                'first_name' => 'Phùng',
                'last_name' => 'Khoa',
                'date_of_birth' => fake()->date,
                'gender' => 'Nam',
                'phone_number' => '0938492388',
                'image' => 'anh8.jpg',
                'card_id' => 8,
                'origin' => 'Số 1,ngõ 1-Phường Phúc Xá-Quận Ba Đình-Thành phố Hà Nội',
                'address' => 'Số 1,ngõ 1-Phường Phúc Xá-Quận Ba Đình-Thành phố Hà Nội',
                'user_id' => 8,
                'religion_id' => fake()->numberBetween(1, 3),
                'nationality_id' => 1,
                'ethnicity_id' => fake()->numberBetween(1, 4),
                'level_id' => fake()->numberBetween(1, 3),
                'position_id' => fake()->numberBetween(1, 10),
            ],
            [
                'first_name' => 'Đào',
                'last_name' => 'Hòa',
                'date_of_birth' => fake()->date,
                'gender' => 'Nam',
                'phone_number' => '0938492389',
                'image' => 'anh9.jpg',
                'card_id' => 9,
                'origin' => 'Số 1,ngõ 1-Phường Phúc Xá-Quận Ba Đình-Thành phố Hà Nội',
                'address' => 'Số 1,ngõ 1-Phường Phúc Xá-Quận Ba Đình-Thành phố Hà Nội',
                'user_id' => 9,
                'religion_id' => fake()->numberBetween(1, 3),
                'nationality_id' => 1,
                'ethnicity_id' => fake()->numberBetween(1, 4),
                'level_id' => fake()->numberBetween(1, 3),
                'position_id' => fake()->numberBetween(1, 10),
            ],
            [
                'first_name' => 'Vũ',
                'last_name' => 'Tùng',
                'date_of_birth' => fake()->date,
                'gender' => 'Nam',
                'phone_number' => '0938492390',
                'image' => 'anh10.jpg',
                'card_id' => 10,
                'origin' => 'Số 1,ngõ 1-Phường Phúc Xá-Quận Ba Đình-Thành phố Hà Nội',
                'address' => 'Số 1,ngõ 1-Phường Phúc Xá-Quận Ba Đình-Thành phố Hà Nội',
                'user_id' => 10,
                'religion_id' => fake()->numberBetween(1, 3),
                'nationality_id' => 1,
                'ethnicity_id' => fake()->numberBetween(1, 4),
                'level_id' => fake()->numberBetween(1, 3),
                'position_id' => fake()->numberBetween(1, 10),
            ]
        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
