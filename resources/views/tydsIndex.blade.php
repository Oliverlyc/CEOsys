@extends('layouts.tyds')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card ">
            <div class="card-header">{{__('欢迎大家报名哦~')}}</div>
                @if(Session::has('msg'))
                    <div class="alert alert-success alert-dismissible" role="alert">{{Session::get('msg')}}<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                @endif
                <div class="card-body ">
                    <div class="row" >
                            <img src="http://owcjv0rtr.bkt.clouddn.com/%E9%80%9A%E9%99%A2%E7%94%B5%E8%B5%9BLOGO-PNG.png" alt="" style="width:100%;height: 100%">
                    </div>
                    {{--<div class="row" >--}}
                        {{--<button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal" style="width:100%;margin-bottom:20px;">--}}
                            {{--{{__('比赛介绍')}}--}}
                        {{--</button>--}}
                    {{--</div>--}}
                    {{--<div class="row">--}}
                        {{--<a href="{{ route('showTYDSForm')}}" style="width:100%">--}}
                            {{--<button  class="btn btn-primary" style="width:100%; margin-bottom: 20px;">{{__('1.报名比赛')}}</button>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="row">--}}
                        {{--<a href="{{ route('showTeamForm')}}" style="width:100%">--}}
                            {{--<button  class="btn btn-warning" style="width:100%;margin-bottom: 20px;">{{__('2.登记队伍')}}</button>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="row">--}}
                        {{--<a href="{{ route('showSubjectForm')}}" style="width:100%">--}}
                            {{--<button  class="btn btn-success" style="width:100%;margin-bottom: 20px;">{{__('3.选择赛题')}}</button>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="row">--}}
                        {{--<a href="{{ route('infoIndex')}}" style="width:100%">--}}
                            {{--<button  class="btn btn-danger" style="width:100%;">{{__('4.修改信息')}}</button>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="row">--}}
                        {{--<a href="{{ route('showProcessForm')}}" style="width:100%">--}}
                            {{--<button  class="btn btn-primary" style="width:100%; margin-bottom: 20px;">{{__('1.进度报告')}}</button>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    <div class="row">
                        <a href="{{ route('showFinalTestForm')}}" style="width:100%">
                            <button  class="btn btn-primary" style="width:100%; margin-bottom: 20px;">{{__('1.作品验收登记')}}</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">{{__('比赛介绍')}}</h4>                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h3>通信与信息工程学院第三届大学生通信电子设计竞赛</h3>
                    <hr></hr>
                    <p>注：<strong>请参加比赛的同学务必加群：823058242，</strong>届时比赛的相关信息会在群内以公告的形式发送。</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
