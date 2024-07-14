<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractRequest extends FormRequest
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
                            'contract_name' => 'required',
                            'sign_date'=> 'required',
                            'image'=> 'required',
                            'effective_date'=> 'required',
                            'expiration_date'=> 'required',
                            'type_contract'=> 'required',
                            'salary'=> 'required',
                            'full_name'=> 'required',
                            'contract_terms'=> 'required',
                            'contract_infor'=> 'required',
                            'employee_id'=> 'required',
                            'position_id'=> 'required'
                        ];
                        break;
                    case 'edit':
                        $rules = [
                            'contract_name' => 'required',
                            'sign_date'=> 'required',
                            'effective_date'=> 'required',
                            'expiration_date'=> 'required',
                            'type_contract'=> 'required',
                            'salary'=> 'required',
                            'full_name'=> 'required',
                            'contract_terms'=> 'required',
                            'contract_infor'=> 'required',
                            'employee_id'=> 'required',
                            'position_id'=> 'required'
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
            'contract_name.required'=>'Không được để trống tên chức vụ',
            'image.required'=>'Không được để trống ảnh',
            'sign_date.required'=>'Không được để trống ngày kí',
            'effective_date.required'=>'Không được để trống ngày có hiệu lực',
            'expiration_date.required'=>'Không được để trống ngày hết hạn',
            'type_contract.required'=>'Không được để trống loại hợp đồng',
            'salary.required'=>'Không được để trống lương',
            'full_name.required'=>'Không được để trống họ và tên',
            'contract_terms.required'=>'Không được để trống điều khoản hợp đồng',
            'contract_infor.required'=>'Không được để trống thông tin hợp đồng',
            'employee_id.required'=>'Không được để trống tên mã nhân viên',
            'position_id.required'=>'Không được để trống vị trí',
        ];
    }
}
