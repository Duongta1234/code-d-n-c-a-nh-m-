<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidateRequest extends FormRequest
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
        $rules = [];
        $currentAction = $this->route()->getActionMethod();
        switch ($this->method()) :
            case 'POST' :
                switch ($currentAction):
                    case 'add':
                        $rules = [
                            'name' => 'required',
                            'email' => 'required',
                            'phone'=> 'required',
                            'address'=> 'required',
                            'file_cv'=> 'required|mimes:pdf|max:2048'
                        ];
                        break;
                endswitch;
                break;
        endswitch;
        return $rules;
    }
    public function messages()
    {
        return [
            'name.required'=>'Không được để trống tiêu đề bài đăng',
            'email.required'=>'Không được để trống mô tả',
            'phone.required'=>'Không được để trống yêu cầu',
            'address.required'=>'Không được để trống quyền lợi',
            'file_cv.required'=>'Không được để trống thời gian làm việc',
            'file_cv.mimes'=>'Vui lòng tải file dưới 2MB'
        ];
    }
}
