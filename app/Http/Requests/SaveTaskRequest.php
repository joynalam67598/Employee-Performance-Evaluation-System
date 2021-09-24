<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveTaskRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'department_id'=> 'required',
            'manager_id'=> 'required',
            'task_name'=> 'required|max:30|min:3',
            'task_official_id'=> 'required',
            'days_to_complete'=> 'required',
            'task_deadline'=> 'required',
            'number_of_stage'=> 'required',
            'task_description'=> 'required',
        ];
    }
}
