<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StatusEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [];
        $currentAction = $this->route()->getActionMethod();
        switch ($this->method()) :
            case 'POST' :
                switch ($currentAction):
                    case 'add':
                        $rules = [
                            'start_date' => 'required',
                            'end_date' => 'required',
                            'status' => 'required',

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
            'start_date.required'=>'Không được để trống start_date',
            'end_date.required'=>'Không được để trống end_date',
            'status.required'=>'Không được để trống status'
        ];
    }
}
