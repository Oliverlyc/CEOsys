<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MemberRequest;
use App\Member;
use Maatwebsite\Excel\Excel;
class MemberController extends Controller
{
    public function showEnterForm()
    {
        return view('ceo.form');
    }

    public function index()
    {
        return view('ceoIndex');
    }

    public function store(MemberRequest $request)
    {

        $arr = [
            'name' => $request->name,
            'student_id' => $request->student_id,
            'college' => $request->college,
            'major' => $request->major,
            'phone_num' => $request->phone_num
        ];
        $member = Member::where('student_id',$request->student_id)->count();
        if($member != 0){
            return redirect('/index')->with('msg','你已经报名过了');
        }
        $res = Member::create($arr);
        if($res){
            return redirect('/index')->with('msg','报名成功');
        }
    }
    
    public function showMemberList()
    {
        $member = Member::select('student_id','name','college','major','phone_num');
        $members = $member->get();
        $count = $member->count();
        return view('ceo.memberList',['count'=>$count,'members'=>$members]);
    }

    public function getList()
    {
        $res = Member::select('student_id','name','college','major','phone_num')->get();
        collect($res->toArray())->downloadExcel('inf.xls');
        if($res){
            return redirect('/memberList')->with('msg','下载成功');
        }        
    }
}
