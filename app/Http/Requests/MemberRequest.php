<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            'student_id'=>['regex:/^[B]{1}[1]{1}[7]{1}[0-1]{1}[0-5]{1}[0-2]{1}[0-9]{1}[0-4]{1}[0-9]{1}$/'],
            'college'=>'required|string',
            'major'=>'required|string',
            'phone_num'=>'required|integer',
            'phone_num'=>['regex:/^1([358][0-9]|4[579]|66|7[0135678]|9[89])[0-9]{8}$/'],
        ];
    }
    public function messages()
    {
        return [
            'student_id.required'=>'这里不能为空哦(～￣▽￣)～ ',            
            'student_id.regex'=>'参赛选手只能是大一哦(～￣▽￣)～ ',            
            'name.required'=>'这里不能为空哦(～￣▽￣)～ ',
            'college.required'=>'这里不能为空哦(～￣▽￣)～ ',
            'major.required'=>'这里不能为空哦(～￣▽￣)～ ',
            'phone_num.required'=>'这里不能为空哦(～￣▽￣)～ ',
            'phone_num.regex'=>'手机号不符合要求哦(～￣▽￣)～ ',
        ];
    }
}
