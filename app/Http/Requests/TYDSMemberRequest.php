<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TYDSMemberRequest extends FormRequest
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
            'name'=>'required|string',
            'student_id'=>'required|string',
            'student_id'=>['regex:/^[B]{1}[1]{1}[5-8]{1}[0-1]{1}[0-9]{1}[0-2]{1}[0-9]{1}[0-4]{1}[0-9]{1}$/'],
            'major'=>'required|string',
            'tel'=>'required|integer',
            'direction' => 'required|string'
        ];
    }
    public function messages()
    {
        return [
            'student_id.required'=>'这里不能为空哦(～￣▽￣)～ ',
            'student_id.regex'=>'参赛选手只能是15-18级哦(～￣▽￣)～ ',
            'name.required'=>'这里不能为空哦(～￣▽￣)～ ',
            'major.required'=>'这里不能为空哦(～￣▽￣)～ ',
            'tel.required'=>'这里不能为空哦(～￣▽￣)～ ',
            'direction.required'=>'方向不能为空哦(～￣▽￣)～ ',
        ];
    }
}
