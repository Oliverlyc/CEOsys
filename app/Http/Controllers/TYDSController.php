<?php

namespace App\Http\Controllers;

use App\{TYDSMember, TYDSSubject, TYDSTeam};
use App\Http\Requests\{TYDSMemberRequest, TYDSTeamRequest};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TYDSController extends Controller
{
    const SUBJECT = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
    public function index()
    {
        return view('tydsIndex');
    }

    public function showTYDSForm()
    {
        return view('tyds.form');
    }

    public function showTeamForm()
    {
        return view('tyds.team');
    }

    public function showSubjectForm(){
        return view('tyds.subject');
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
            'direction' => $request->post('direction'),
            'level' => $this->confirmLevel([$request->post('student_id')]),
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
        $teams = TYDSTeam::with('tydsMember')->get()->map(function($item){
            $arr = [];
            foreach ($item->tydsMember as $member){
                $member = [
                    'student_id' => $member->student_id,
                    'name' => $member->name,
                    'major' => $member->major,
                    'tel' => $member->tel,
                    'direction' => $member->direction
                ];
                array_push($arr, $member);
            }
            return [
                'subject' => $item->subject,
                'members' => $arr
            ];
        });
        $members = TYDSMember::where('team',NULL)->with('tydsSubject')->get()->map(function($item){
            if($item->tydsSubject !== NULL){
                $item->tydsSubject = $item->tydsSubject->subject;
            }

            return [
                'subject' => $item->tydsSubject,
                'member' => [
                    'student_id' => $item->student_id,
                    'name' => $item->name,
                    'major' => $item->major,
                    'tel' => $item->tel,
                    'direction' => $item->direction
                ]
            ];
        });
//        return response(['data'=> $teams]);
        return view('tyds.memberList',['teams'=>$teams,'members'=>$members]);
    }

    public function getList()
    {
        return TYDSMember::select('student_id','name','class','major','tel','direction','team')->orderBy('team')->get()->downloadExcel('inf.xls');
    }

    public function judgeMemberExist($studentId, $tel) {
        $res = TYDSMember::select('id')->where([
            'student_id' => $studentId,
            'tel' => $tel,
            ])->get();
        if($res->isEmpty()){
            return false;
        }else{
            return true;
        }
    }

    public function getTeamInfoByStudentIdAndTel($studentId, $tel){
        $res = TYDSMember::where([
            'student_id' => $studentId,
            'tel' => $tel,
        ])->first();
        if($res == null){
            return false;
        }else{
            return $res->tydsTeam;
        }
    }

    public function confirmLevel($studentIdArr)
    {
        foreach ($studentIdArr as $studentId){
            if (substr($studentId, 1, 2) <= '16'){
                return 1;
            }
        }
        return 0;
    }

    public function subjectInfo($subject)
    {
        if(!array_key_exists($subject, self::SUBJECT)){
            return 'empty';
        }
        $info = DB::table('tyds_subjects')->select('count', 'level')->where('subject', (self::SUBJECT)[$subject])->lockForUpdate()->get()->first();
        if ($info->count <= 0){
            return 'full';
        }else{
            return $info;
        }
    }

    public function storeSubjectByTeam($teamInfo, $subject)
    {
        $subjectInfo = $this->subjectInfo($subject);
        if ($subjectInfo === 'full'){
            return redirect('tyds2018/index')->with('msg', '该题人数已满');
        }elseif ($subjectInfo === 'empty'){
            return redirect('tyds2018/subject')->with('msg', '查无此题');
        }elseif ($teamInfo->level > $subjectInfo->level){
            return redirect('tyds2018/subject')->with('msg', '高年级组不可以选择低年级组的题目哦~');
        }
        $res = TYDSTeam::find($teamInfo->id)->tydsSubject;
        if($res === NULL){
            DB::transaction(function()use($teamInfo, $subject){
                DB::table('tyds_teams')->where('id', $teamInfo->id)->update(['subject' => (self::SUBJECT)[$subject]]);
                DB::table('tyds_subjects')->where('subject', (self::SUBJECT)[$subject])->decrement('count');
            });
        }else{
            return redirect('tyds2018/index')->with('msg', '此队伍已选过赛题~');
        }
        return redirect('tyds2018/index')->with('msg', '选题成功，比赛加油！！！');
    }

    public function storeSubjectByMember($studentId, $tel, $subject)
    {
        $studentInfo = TYDSMember::select('level')->where(['student_id' => $studentId, 'tel' => $tel])->first();
        if($studentInfo == null){
            return redirect('tyds2018/enter')->with('msg', '请先完善个人信息');
        }
        $subjectInfo = $this->subjectInfo($subject);
        if ($subjectInfo === 'full'){
            return redirect('tyds2018/index')->with('msg', '该题人数已满');
        }elseif ($subjectInfo === 'empty'){
            return redirect('tyds2018/subject')->with('msg', '查无此题');
        }elseif ($studentInfo->level > $subjectInfo->level){
            return redirect('tyds2018/subject')->with('msg', '高年级组不可以选择低年级组的题目哦~');
        }
        $res = TYDSMember::where('student_id', $studentId)->first()->tydsSubject;
        if ($res === NULL){
            DB::transaction(function()use($studentId, $tel, $subject){
                DB::table('tydsmembers')->where(['student_id' => $studentId, 'tel' => $tel])->update(['subject' => (self::SUBJECT)[$subject]]);
                DB::table('tyds_subjects')->where('subject', (self::SUBJECT)[$subject])->decrement('count');
            });
        }else{
            return redirect('tyds2018/index')->with('msg', '你已选过赛题~');
        }
        return redirect('tyds2018/index')->with('msg', '选题成功，比赛加油！！！');
    }

    public function storeSubjectInfo(Request $request)
    {
        $studentId = $request->post('student_id');
        $tel = $request->post('phone_num');
        $subject = $request->post('subject');
        $this->judgeMemberExist($studentId, $tel);
        $teamInfo = $this->getTeamInfoByStudentIdAndTel($studentId, $tel);
        if($teamInfo){
            return $this->storeSubjectByTeam($teamInfo, $subject);
        }else{
            return $this->storeSubjectByMember($studentId, $tel, $subject);
        }
//        else{
//            return redirect('tyds2018/index')->with('msg', '请先登记队伍信息哦~');
//        }

    }
    public function storeTeamInfo(TYDSTeamRequest $request)
    {
        $studentIdA = $request->post('studentA_id');
        $telA = $request->post('phone_numA');
        $studentIdB = $request->post('studentB_id');
        $telB = $request->post('phone_numB');
        if(!$this->judgeMemberExist($studentIdA, $telA)||!$this->judgeMemberExist($studentIdB, $telB)){
            return redirect('tyds2018/index')->with('msg', '有队员尚未报名(或信息错误)，请完善个人信息');
        }
        if($this->getTeamInfoByStudentIdAndTel($studentIdA, $telA) || $this->getTeamInfoByStudentIdAndTel($studentIdB, $telB)){
            return redirect('tyds2018/index')->with('msg', '有队员已经登记队伍，请联系负责人');
        }
        $level = $this->confirmLevel([$studentIdA, $studentIdB]);
        $teamId = TYDSTeam::create(['studentA_id' => $studentIdA,'studentB_id' => $studentIdB, 'level' => $level])->id;
        $res = TYDSMember::whereIn('student_id', [$studentIdA,$studentIdB])->update(['team' => $teamId]);
//        $res1 = DB::table('tydsmembers')->where('student_id',$studentIdA)->update(['team' => $resA->id]);
//        $res2 = DB::table('tydsmembers')->where('student_id',$studentIdB)->update(['team' => $resA->id]);
        if($res){
            return redirect('tyds2018/index')->with('msg', '队伍登记成功');
        }
    }
}
