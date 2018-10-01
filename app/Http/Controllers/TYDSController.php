<?php

namespace App\Http\Controllers;

use App\TYDSMember;
use App\Http\Requests\TYDSMemberRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $member = TYDSMember::select('student_id','name','major','tel','direction','team')->orderBy('team');
        $members = $member->get();
        $count = $member->count();
        return view('tyds.memberList',['count'=>$count,'members'=>$members]);
    }

    public function getList()
    {
        return TYDSMember::select('student_id','name','class','major','tel','direction','team')->orderBy('team')->get()->downloadExcel('inf.xls');
    }

    public function showTeamForm() {
        return view('tyds.team');
    }

    public function judgeMemberExist($studentId, $tel) {
        $res = TYDSMember::select('id')->where([
            'student_id' => $studentId,
            'tel' => $tel,
            ])->get();
        if($res->isEmpty()){
            return false;
        }else{
            return $res->first();
        }
    }
    public function judgeTeamExist($studentId, $tel){
        $res = TYDSMember::select('team')->where([
            'student_id' => $studentId,
            'tel' => $tel,
        ])->get()->first()->team;
        if($res == NULL){
            return false;
        }else{
            return true;
        }
    }

    public function storeTeamInfo(Request $request){
        $studentIdA = $request->post('student_idA');
        $telA = $request->post('phone_numA');
        $studentIdB = $request->post('student_idB');
        $telB = $request->post('phone_numB');
        $resA = $this->judgeMemberExist($studentIdA, $telA);
        $resB = $this->judgeMemberExist($studentIdB, $telB);
        if (!$resA || !$resB){
            return redirect('tyds2018/index')->with('msg', '有队员尚未报名(或信息错误)，请完善个人信息');
        }
        if($this->judgeTeamExist($studentIdA, $telA) || $this->judgeTeamExist($studentIdB, $telB)){
            return redirect('tyds2018/index')->with('msg', '有队员已经登记队伍，请联系负责人');
        }
        $res1 = DB::table('tydsmembers')->where('student_id',$studentIdA)->update(['team' => $resA->id]);
        $res2 = DB::table('tydsmembers')->where('student_id',$studentIdB)->update(['team' => $resA->id]);
        if($res1 && $res2){
            return redirect('tyds2018/index')->with('msg', '队伍登记成功');
        }
    }
}
