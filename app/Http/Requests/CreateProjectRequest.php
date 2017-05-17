<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
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
            'name'=>'required|unique:projects',
            'thumb_img'=>'image|dimensions:min_width=200,min_height=100'
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
