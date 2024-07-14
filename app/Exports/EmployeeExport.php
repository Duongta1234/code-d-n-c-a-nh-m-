<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class EmployeeExport implements FromCollection ,WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function collection()
    {
        return Employee::all();
    }

    public function map($employee): array
    { 
        return [
            $employee->first_name,
            $employee->last_name,
            $employee->date_of_birth,
            $employee->image,
            $employee->gender,
            $employee->phone_number,
            $employee->card->citizen_identity_card,
            $employee->nationality->nationality_name,
            $employee->ethnicity->ethnicity_name,
            $employee->religion->religion_name,
            $employee->position->position_name,
            $employee->level->level_name,
            $employee->origin,
            $employee->address,
            $employee->user->email,
        ];
    }

    public function headings(): array
    {
        return [
            'Họ',
            'Tên',
            'Ngày sinh',
            'Hình ảnh',
            'Giới tính',
            'Số điện thoại',
            'Căn cước công dân',
            'Quốc tịch',
            'Dân tộc',
            'Tôn giáo',
            'Chức vụ',
            'Trình độ',
            'Nguyên quán',
            'Cứ trú',
            'Email'
        ];
    }
}
