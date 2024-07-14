<?php

namespace Database\Seeders;

use App\Models\Contract;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $contracts = [
        [
            'contract_name' => 'Làm việc',
            'sign_date' => fake()->date,
            'file_pdf' => 'Hop_dong1.pdf',
            'effective_date' => fake()->date,
            'expiration_date' => fake()->date,
            'employee_id' => 'PE01',
            'position_id' => fake()->numberBetween(1, 10),
        ],
        [
            'contract_name' => 'Làm việc',
            'sign_date' => fake()->date,
            'file_pdf' => 'Hop_dong2.pdf',
            'effective_date' => fake()->date,
            'expiration_date' => fake()->date,
            'employee_id' => 'PE02',
            'position_id' => fake()->numberBetween(1, 10),
        ],
        [
            'contract_name' => 'Làm việc',
            'sign_date' => fake()->date,
            'file_pdf' => 'Hop_dong3.pdf',
            'effective_date' => fake()->date,
            'expiration_date' => fake()->date,
            'employee_id' => 'PE03',
            'position_id' => fake()->numberBetween(1, 10),
        ],
        [
            'contract_name' => 'Làm việc',
            'sign_date' => fake()->date,
            'file_pdf' => 'Hop_dong4.pdf',
            'effective_date' => fake()->date,
            'expiration_date' => fake()->date,
            'employee_id' => 'PE04',
            'position_id' => fake()->numberBetween(1, 10),
        ],
        [
            'contract_name' => 'Làm việc',
            'sign_date' => fake()->date,
            'file_pdf' => 'Hop_dong5.pdf',
            'effective_date' => fake()->date,
            'expiration_date' => fake()->date,
            'employee_id' => 'PE05',
            'position_id' => fake()->numberBetween(1, 10),
        ],
        [
            'contract_name' => 'Làm việc',
            'sign_date' => fake()->date,
            'file_pdf' => 'Hop_dong6.pdf',
            'effective_date' => fake()->date,
            'expiration_date' => fake()->date,
            'employee_id' => 'PE06',
            'position_id' => fake()->numberBetween(1, 10),
        ],
        [
            'contract_name' => 'Làm việc',
            'sign_date' => fake()->date,
            'file_pdf' => 'Hop_dong7.pdf',
            'effective_date' => fake()->date,
            'expiration_date' => fake()->date,
            'employee_id' => 'PE07',
            'position_id' => fake()->numberBetween(1, 10),
        ],
        [
            'contract_name' => 'Làm việc',
            'sign_date' => fake()->date,
            'file_pdf' => 'Hop_dong8.pdf',
            'effective_date' => fake()->date,
            'expiration_date' => fake()->date,
            'employee_id' => 'PE08',
            'position_id' => fake()->numberBetween(1, 10),
        ],
        [
            'contract_name' => 'Làm việc',
            'sign_date' => fake()->date,
            'file_pdf' => 'Hop_dong9.pdf',
            'effective_date' => fake()->date,
            'expiration_date' => fake()->date,
            'employee_id' => 'PE09',
            'position_id' => fake()->numberBetween(1, 10),
        ],
        [
            'contract_name' => 'Làm việc',
            'sign_date' => fake()->date,
            'file_pdf' => 'Hop_dong10.pdf',
            'effective_date' => fake()->date,
            'expiration_date' => fake()->date,
            'employee_id' => 'PE10',
            'position_id' => fake()->numberBetween(1, 10),
        ],
       ];

       foreach($contracts as $contract){
        Contract::create($contract);
       }
    }
}
