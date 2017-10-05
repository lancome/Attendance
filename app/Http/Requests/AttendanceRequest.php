<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AttendanceRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pivot_id' => 'required',
            'student_id' => 'required',
            'is_was' => 'required',
            'att_date' => 'required',
        ];
    }
}
