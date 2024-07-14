<?php

namespace App\Http\Requests;

use App\Models\BasicSalary;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BasicSalaryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $currentYear = date('Y');
        $currentMonth = date('n');

        $rules = [
            'employee_id' => [
                'required',
                Rule::unique('basic_salaries', 'employee_id')->where(function ($query) {
                    // Kiểm tra xem employee đã tồn tại trong bảng hay không
                    return $query->where('employee_id', request()->input('employee_id'));
                }),
            ],
            'month' => [
                'required',
                'between:1,12',
                function ($attribute, $value, $fail) use ($currentMonth) {
                    if ($value != $currentMonth) {
                        $fail($attribute.' phải là tháng hiện tại.');
                    }
                },
            ],
            'year' => ['required', Rule::in([$currentYear])],
            'basic_salary' => [
                'required',
                function ($attribute, $value, $fail) {
                    // Kiểm tra xem employee_id đã tồn tại với basic_salary hay không
                    $employee_id = request()->input('employee_id');
                    $existingSalary = BasicSalary::where('employee_id', $employee_id)->first();

                    if ($existingSalary) {
                        $fail('Lương cơ bản đã tồn tại cho nhân viên này.');
                    }
                },
            ],
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được bỏ trống!',
            'year.in' => ':attribute chỉ nhập năm hiện tại',
            'month.between' => ':attribute chỉ được nhập trong khoảng từ 1 đến 12',
            'employee_id.unique' => ':attribute đã tồn tại'
        ];
    }

    public function attributes()
    {
        return [
            'employee_id' => 'Mã nhân viên',
            'month' => 'Tháng',
            'year' => 'Năm',
            'basic_salary' => 'Lương cơ bản',

        ];
    }
}


