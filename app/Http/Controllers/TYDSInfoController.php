<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\TYDSMember;
use Illuminate\Support\Facades\DB;
class TYDSInfoController extends TYDSController
{
    const SUBJECT = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
    public function index()
    {
        return view('tyds.info');
    }

    public function showChangeSubjectForm()
    {
        return view('tyds.changeSubject');
    }

    public function showDeleteTeamForm()
    {
        return view('tyds.deleteTeam');
    }

    public function showFinalTestForm()
    {
        return view('tyds.finalTest');
    }
    public function changeSubject(Request $request)
    {
        $studentId = $request->post('student_id');
        $tel = $request->post('phone_num');
        $subject = $request->post('subject');
        $subjectInfo = $this->subjectInfo($subject);
        $teamInfo = $this->getTeamInfoByStudentIdAndTel($studentId, $tel);
        $studentInfo = TYDSMember::select('level')->where(['student_id' => $studentId, 'tel' => $tel])->first();
        if($studentInfo == null){
            return redirect('tyds2018/info/changeSubject')->with('msg', '请先完善个人信息(或输入信息有误)');
        }
        if($subjectInfo === 'empty'){
            return redirect('tyds2018/info/changeSubject')->with('msg', '查无此题');
        }elseif ($studentInfo->level > $subjectInfo->level){
            return redirect('tyds2018/info/changeSubject')->with('msg', '高年级组不可以选择低年级组的题目哦~');
        }elseif ($teamInfo !== null){
            if ($teamInfo->level > $subjectInfo->level){
                return redirect('tyds2018/info/changeSubject')->with('msg', '高年级组不可以选择低年级组的题目哦~');
            }
        }
        if($teamInfo){
            DB::transaction(function()use($teamInfo, $subject){
                DB::table('tyds_teams')->where('id', $teamInfo->id)->update(['subject' => (self::SUBJECT)[$subject]]);
            });
        }else{
            DB::transaction(function()use($studentId, $tel, $subject){
                DB::table('tydsmembers')->where(['student_id' => $studentId, 'tel' => $tel])->update(['subject' => (self::SUBJECT)[$subject]]);
            });
        }
        return redirect('tyds2018/index')->with('msg', '修改成功，比赛加油！！！');
    }

    public function deleteTeam(Request $request)
    {
        $studentId = $request->post('student_id');
        $tel = $request->post('phone_num');
        $teamInfo = $this->getTeamInfoByStudentIdAndTel($studentId, $tel);

        if($teamInfo){
            $studentIdA = $teamInfo->studentA_id;
            $studentIdB = $teamInfo->studentB_id;
            DB::table('tyds_teams')->where('id',$teamInfo->id)->delete();
            TYDSMember::whereIn('student_id', [$studentIdA,$studentIdB])->update(['team' => null]);
            return redirect('tyds2018/index')->with('msg', '队伍信息删除成功');
        }else{
            return redirect('tyds2018/index')->with('msg', '你还没有登记队伍(或输入信息有误)');
        }
    }

    public function storeFinalTestForm(Request $request)
    {
        $studentId = $request->post('student_id');
        $tel = $request->post('phone_num');
        $teamInfo = $this->getTeamInfoByStudentIdAndTel($studentId, $tel);
        if($teamInfo){
            $teamInfo->update(['finish' => 1]);
        }else{
            $member = $this->judgeMemberExist($studentId, $tel);
            if($member){
                DB::table('tydsmembers')->where(['student_id' => $studentId, 'tel' => $tel])->update(['finish' => 1]);
            }else{
                return redirect('tyds2018/index')->with('msg', '更新信息失败，请联系管理员');
            }
        }
        return redirect('tyds2018/index')->with('msg', '信息更新成功');
    }
}
