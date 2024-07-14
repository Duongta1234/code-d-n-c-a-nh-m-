<?php

namespace App\Exports;

use App\Models\Salary;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class SalaryExport implements FromCollection,WithMapping , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Salary::all();
    }

    public function map($salary): array
    {
        $name =  $salary->basicSalary->employee->first_name.' '.$salary->basicSalary->employee->last_name;
        return[
            $salary->basicSalary->employee_id,
            $name,
            $salary->basicSalary->month,
            $salary->basicSalary->basic_salary,
            $salary->quantity_attendance,
            $salary->allowed_leave_days,
            $salary->absent_days,
            $salary->approved_leave_days,
            $salary->deducted_salary,
            $salary->final_salary,

        ];
    }

    public function headings(): array
    {
        return[
            'Mã nhân viên',  
            'Họ tên',
            'Tháng',
            'Lương cơ bản',
            'Ngày công của tháng',
            'Số ngày phép',
            'Ngày vắng mặt',
            'Ngày nghỉ được duyệt',
            'Lương bị trừ',
            'Lương hiện tại',
        ];
    }
}
