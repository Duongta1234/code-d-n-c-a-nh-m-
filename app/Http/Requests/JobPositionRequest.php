<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobPositionRequest extends FormRequest
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
                            'quantity' => 'required|numeric|min:1'
                        ];
                        break;
                    case 'edit':
                        $rules = [
                            'title' => 'required',
                            'description' => 'required',
                            'quantity' => 'required|numeric|min:1',
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
            'title.required'=>'Không được để trống tên vị trí tuyển dụng',
            'description.required'=>'Không được để trống mô tả',
            'quantity.required'=>'Không được để trống số lượng tuyển',
            'quantity.numeric'=>'Số lượng tuyển phải lớn hơn 0'
        ];
    }
}
