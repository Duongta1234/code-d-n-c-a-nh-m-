<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobPostingRequest extends FormRequest
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
                            'title' => 'required',
                            'description' => 'required',
                            'request'=> 'required',
                            'salary'=> 'required',
                            'benefit'=> 'required',
                            'working_time'=> 'required',
                            'address'=> 'required',
                            'application_deadline'=> 'required',
                            'contact'=> 'required',
                            'job_position_id'=> 'required',
                            'user_id'=> 'required'
                        ];
                        break;
                    case 'edit':
                        $rules = [
                            'title' => 'required',
                            'description' => 'required',
                            'request'=> 'required',
                            'salary'=> 'required',
                            'benefit'=> 'required',
                            'working_time'=> 'required',
                            'address'=> 'required',
                            'application_deadline'=> 'required',
                            'contact'=> 'required',
                            'job_position_id'=> 'required',
                            'user_id'=> 'required'
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
            'title.required'=>'Không được để trống tiêu đề bài đăng',
            'description.required'=>'Không được để trống mô tả',
            'request.required'=>'Không được để trống yêu cầu',
            'benefit.required'=>'Không được để trống quyền lợi',
            'working_time.required'=>'Không được để trống thời gian làm việc',
            'address.required'=>'Không được để trống địa chỉ',
            'application_deadline.required'=>'Không được để trống thời hạn đăng tuyển',
            'contact.required'=>'Không được để trống thông tin liên lạc',
            'salary.required'=>'Không được để trống tiền lương',
            'job_position_id.required'=>'Không được để trống vị trí tuyển dụng',
            'user_id.required'=>'Không được để trống tên người đăng'

        ];
    }
}
