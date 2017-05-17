<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProjectRequest extends FormRequest
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
            'name'=>'required'
            //
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'项目名称为必填项',
            'name.unique'=>'名称已存在',
            'thumb_img.image'=>'不是图片格式',
        ];
    }
}
