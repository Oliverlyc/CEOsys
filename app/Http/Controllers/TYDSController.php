<?php

namespace App\Http\Controllers;

use App\TYDSMember;
use App\Http\Requests\TYDSMemberRequest;
use Illuminate\Http\Request;

class TYDSController extends Controller
{
    public function index()
    {
        return view('tydsIndex');
    }

    public function showTYDSForm()
    {
        return view('tyds.form');
    }

    public function store(TYDSMemberRequest $request)
    {
        $arr = [
            'student_id' => $request->post('student_id'),
            'name' => $request->post('name'),
            'gender' => $request->post('gender'),
            'tel' => $request->post('tel'),
            'class' => $request->post('class'),
            'major' => $request->post('major'),
            'direction' => $request->post('direction')
        ];
        $member = TYDSMember::where('student_id',$request->post('student_id'))->count();
        if($member != 0){
            return redirect('tyds2018/index')->with('msg','你已经报名过了');
        }
        $res = TYDSMember::create($arr);
        if($res){
            return redirect('tyds2018/index')->with('msg','报名成功');
        }
    }
    public function showMemberList()
    {
        $member = TYDSMember::select('student_id','name','major','tel','direction','created_at');
        $members = $member->get();
        $count = $member->count();
        return view('tyds.memberList',['count'=>$count,'members'=>$members]);
    }

    public function getList()
    {
        return TYDSMember::select('student_id','name','class','major','tel','direction','created_at')->get()->downloadExcel('inf.xls');
    }
}
