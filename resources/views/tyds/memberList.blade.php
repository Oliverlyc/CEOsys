@extends('layouts.tyds')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-6 ">{{__('个人参赛')}}
        <a href="{{ route('getList') }}" > 
            <button type="button" class="btn btn-info">{{__('下载表格')}}</button>
        </a>
    </div>
        <div class="col-md-6">
        
        </div>
    </div>
    @if(Session::has('msg'))
    <div class="row">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible" role="alert">{{Session::get('msg')}}<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        </div>
    </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr class="text-md-center">
                <th>{{__('id')}}</th>
                <th>{{__('学号')}}</th>
                <th>{{__('姓名')}}</th>
                {{--<th>{{__('班级')}}</th>--}}
                <th>{{__('专业')}}</th>
                <th>{{__('联系方式')}}</th>
                <th>{{__('方向')}}</th>
                <th>{{__('赛题')}}</th>
                <th>{{__('进度报告')}}</th>
                <th>{{__('问题')}}</th>
                <th>{{__('参加验收')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $index => $member)
                <tr>
                    <td>{{$index+1}}</td>
                    <td>{{$member['member']['student_id']}}</td>
                    <td>{{$member['member']['name']}}</td>
                    {{--<td>{{$member['class']}}</th>--}}
                    <td>{{$member['member']['major']}}</td>
                    <td>{{$member['member']['tel']}}</td>
                    <td>{{$member['member']['direction']}}</td>
                    <td>{{$member['subject']}}</td>
                    <td>{{$member['process']}}</td>
                    <td>{{$member['problem']}}</td>
                    <td>{{$member['finish']}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="col-md-6 ">{{__('组队参赛')}}
    </div>
    <table class="table table-bordered">
        <thead>
        <tr class="text-md-center">
            <th>{{__('id')}}</th>
            <th>{{__('学号')}}</th>
            <th>{{__('姓名')}}</th>
            {{--<th>{{__('班级')}}</th>--}}
            <th>{{__('专业')}}</th>
            <th>{{__('联系方式')}}</th>
            <th>{{__('方向')}}</th>
            <th>{{__('赛题')}}</th>
            <th>{{__('进度报告')}}</th>
            <th>{{__('问题')}}</th>
            <th>{{__('参加验收')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($teams as $index => $team)
            <tr>
                <td rowspan="2">{{$index+1}}</td>
                <td>{{$team['members'][0]['student_id']}}</td>
                <td>{{$team['members'][0]['name']}}</td>
                {{--<td>{{$member['class']}}</th>--}}
                <td>{{$team['members'][0]['major']}}</td>
                <td>{{$team['members'][0]['tel']}}</td>
                <td>{{$team['members'][0]['direction']}}</td>
                <td rowspan="2">{{$team['subject']}}</td>
                <td rowspan="2">{{$team['process']}}</td>
                <td rowspan="2">{{$team['problem']}}</td>
                <td rowspan="2">{{$team['finish']}}</td>
            </tr>
            <tr>
                <td>{{$team['members'][1]['student_id']}}</td>
                <td>{{$team['members'][1]['name']}}</td>
                {{--<td>{{$member['class']}}</th>--}}
                <td>{{$team['members'][1]['major']}}</td>
                <td>{{$team['members'][1]['tel']}}</td>
                <td>{{$team['members'][1]['direction']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection
