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
                        <button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal" style="width:100%;margin-bottom:20px;">
                            {{__('比赛介绍')}}
                        </button>
                    </div>
                    <div class="row">
                        <a href="{{ route('showTYDSForm')}}" style="width:100%">
                            <button  class="btn btn-primary" style="width:100%;">{{__('我要报名比赛')}}</button>
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
                    <p>注：<strong>请参加比赛的同学务必加群：，</strong>届时比赛的相关信息会在群内以公告的形式发送。</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
