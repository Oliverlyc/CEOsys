<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TYDSTeamRequest extends FormRequest
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
            'studentA_id'=>['regex:/^[B]{1}[1]{1}[5-8]{1}[0-1]{1}[0-9]{1}[0-2]{1}[0-9]{1}[0-4]{1}[0-9]{1}$/'],
            'studentB_id'=>['regex:/^[B]{1}[1]{1}[5-8]{1}[0-1]{1}[0-9]{1}[0-2]{1}[0-9]{1}[0-4]{1}[0-9]{1}$/'],
        ];
    }

    public function messages()
    {
        return [
            'studentA_id.required'=>'这里不能为空哦(～￣▽￣)～ ',
            'studentB_id.required'=>'这里不能为空哦(～￣▽￣)～ ',
            'studentA_id.regex'=>'参赛选手只能是15-18级哦(～￣▽￣)～ ',
            'studentB_id.regex'=>'参赛选手只能是15-18级哦(～￣▽￣)～ ',
        ];

    }
}
