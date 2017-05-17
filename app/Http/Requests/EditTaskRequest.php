<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditTaskRequest extends FormRequest
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
            //
            'title'=>'required|unique:tasks'
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'任务名称必填',
            'title.unique'=>'任务名称已存在'
        ];
    }
}
