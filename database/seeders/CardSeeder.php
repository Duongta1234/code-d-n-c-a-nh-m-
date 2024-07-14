<?php

namespace Database\Seeders;

use App\Models\Card;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cards = [
            [
                'citizen_identity_card' => '001203037120',
                'place_of_issue' => 'Cục cảnh sát',
                'issue_date' => fake()->date,
                'previous_image' => 'previous1.jpg',
                'behind_image' => 'behind1.jpg',
            ],
            [
                'citizen_identity_card' => '001203037121',
                'place_of_issue' => 'Cục cảnh sát',
                'issue_date' => fake()->date,
                'previous_image' => 'previous2.jpg',
                'behind_image' => 'behind2.jpg',
            ],
            [
                'citizen_identity_card' => '001203037122',
                'place_of_issue' => 'Cục cảnh sát',
                'issue_date' => fake()->date,
                'previous_image' => 'previous3.jpg',
                'behind_image' => 'behind3.jpg',
            ],
            [
                'citizen_identity_card' => '001203037123',
                'place_of_issue' => 'Cục cảnh sát',
                'issue_date' => fake()->date,
                'previous_image' => 'previous4.jpg',
                'behind_image' => 'behind4.jpg',
            ],
            [
                'citizen_identity_card' => '001203037124',
                'place_of_issue' => 'Cục cảnh sát',
                'issue_date' => fake()->date,
                'previous_image' => 'previous5.jpg',
                'behind_image' => 'behind5.jpg',
            ],
            [
                'citizen_identity_card' => '001203037125',
                'place_of_issue' => 'Cục cảnh sát',
                'issue_date' => fake()->date,
                'previous_image' => 'previous6.jpg',
                'behind_image' => 'behind6.jpg',
            ],
            [
                'citizen_identity_card' => '001203037126',
                'place_of_issue' => 'Cục cảnh sát',
                'issue_date' => fake()->date,
                'previous_image' => 'previous7.jpg',
                'behind_image' => 'behind7.jpg',
            ],
            [
                'citizen_identity_card' => '001203037127',
                'place_of_issue' => 'Cục cảnh sát',
                'issue_date' => fake()->date,
                'previous_image' => 'previous8.jpg',
                'behind_image' => 'behind8.jpg',
            ],
            [
                'citizen_identity_card' => '001203037131',
                'place_of_issue' => 'Cục cảnh sát',
                'issue_date' => fake()->date,
                'previous_image' => 'previous9.jpg',
                'behind_image' => 'behind9.jpg',
            ],
            [
                'citizen_identity_card' => '001203037132',
                'place_of_issue' => 'Cục cảnh sát',
                'issue_date' => fake()->date,
                'previous_image' => 'previous10.jpg',
                'behind_image' => 'behind10.jpg',
            ]
         ];

        foreach ($cards as $card){
            Card::create($card);
        }
    }
}
