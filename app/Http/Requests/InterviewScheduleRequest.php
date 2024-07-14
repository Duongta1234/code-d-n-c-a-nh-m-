<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InterviewScheduleRequest extends FormRequest
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
        return [
            'user_id'=>'required',
            'profile_screening_id'=>'required',
            'interview_day'=>'required',
            'interview_time'=>'required',
            'interview_location'=>'required',
            'interview_content'=>'required',
            'status'=>'required',
        ];
    }
}
