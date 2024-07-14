<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HolidayRequest extends FormRequest
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

        $rules = [
            'date' => 'required:date',
            'description' => 'required',

        ];
        return $rules;
    }

        public function messages()
    {
        return [
            'required' => ':attribute không được bỏ trống!',
        ];
    }

        public function attributes()
    {
        return [
            'date' => 'Ngày tháng',
            'description' => 'Tên Dịp/Lễ',

        ];
    }
}

