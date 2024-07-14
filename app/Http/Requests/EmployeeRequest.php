<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'birthday' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone_number' => 'required|digits:10',
            'gender' => 'required',
            'citizen_identity_card' => 'required|digits:12|unique:cards,citizen_identity_card',
            'place_of_issue' => 'required|max:255',
            'issue_date' => 'required|date',
            'previous_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'behind_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'origin_province' => 'required',
            'origin_district' => 'required',
            'origin_ward' => 'required',
            'origin_detail' => 'required',
            'address_province' => 'required',
            'address_district' => 'required',
            'address_ward' => 'required',
            'address_detail' => 'required',
            'nationality_id' => 'required',
            'religion_id' => 'required',
            'ethnicity_id' => 'required',
            'level' => 'required',
            'user_id' => 'required',
        ];

        if (!empty($this->route()->employee->id)) {
            $rules['citizen_identity_card'] = 'required|digits:12|unique:cards,citizen_identity_card,'.$this->route()->employee->card->id;
            if ($this->image) {
                $rules['image'] = 'image|mimes:jpeg,png,jpg,gif|max:2048';
            } else {
                unset($rules['image']);
            }

            if ($this->previous_image) {
                $rules['previous_image'] = 'image|mimes:jpeg,png,jpg,gif|max:2048';
            } else {
                unset($rules['previous_image']);
            }

            if ($this->behind_image) {
                $rules['behind_image'] = 'image|mimes:jpeg,png,jpg,gif|max:2048';
            } else {
                unset($rules['behind_image']);
            }
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được bỏ trống!',
            'unique' => ':attribute đã tồn tại!',
            'max' => ':attribute tối đa :max ký tự!',
            'date' => ':attribute không phải là thời gian!',
            'image' => ':attribute không phải là hình ảnh!',
            'mimes' => ':attribute không đúng định dạng!',
            'digits' => ':attribute phải là :digits ký tự!',
            'integer' => ':attribute phải là số!',
        ];
    }

    public function attributes()
    {
        return [
            'first_name' => 'Họ',
            'last_name' => 'Tên',
            'birthday' => 'Ngày sinh',
            'image' => 'Hình ảnh',
            'gender' => 'Giới tính',
            'phone_number' => 'Số điện thoại',
            'citizen_identity_card' => 'Căn cước công dân',
            'place_of_issue' => 'Nơi cấp',
            'issue_date' => 'Ngày cấp',
            'previous_image' => 'Ảnh mặt trước',
            'behind_image' => 'Ảnh mặt sau',
            'origin_province' => 'Nguyên quán tỉnh',
            'origin_district' => 'Nguyên quán quận/huyện',
            'origin_ward' => 'Nguyên quán xã/phường',
            'origin_detail' => 'Địa chỉ cụ thể',
            'address_province' => 'Tỉnh hiện tại',
            'address_district' => 'Quận/huyện hiện tại',
            'address_ward' => 'Xã/phường hiện tại',
            'address_detail' => 'Địa chỉ cụ thể',
            'nationality_id' => 'Quốc tịch',
            'religion_id' => 'Tôn giáo',
            'ethnicity_id' => 'Dân tộc',
            'position' => 'Chức vụ',
            'status_employee' => 'Trạng thái nhân viên',
            'level' => 'Trình độ',
            'user_id' => 'Tài khoản',
        ];
    }
}
