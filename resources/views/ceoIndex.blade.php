@extends('layouts.ceo')

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
                        <a href="{{ route('showEnterForm')}}" style="width:100%">
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
                    <h3>通院、电光院科协联合举办第四届“C.EO”电子爱好者联谊赛</h3>
                    <hr></hr>
                    <p>  为了扎实大一学生的专业基础，提高对专业知识的学习热情，增强各院同学们之间的交流和合作，通信与信息工程学院以及电子与光学工程学院、微电子学院两院科学技术协会联合举办了第四届“C.EO”两院电子爱好联谊赛。</p>
                    <p>注：<strong>请参加比赛的同学务必加群：771445006，</strong>届时比赛的相关信息会在群内以公告的形式发送。</p>
                    <p>“C.EO”两院电子爱好联谊赛比赛基本流程：</p>
                    <ol>
                        <li>扫码报名（为保证公平性，仅限大一同学报名）</li>
                        <li>为保证比赛的公平性，同时为大一同学普及相关软件的使用技巧，今年将由通院科协举办宣讲会</li>
                            <ul>
                                <li>宣讲会(5月5日)将讲解比赛的具体流程、评分细则以及相关软件的使用，例如Tina、Multism、proteus等</li>
                                <li>抽签分组（为保证公平性，队友随机）</li>
                                <li>熟悉软件，备战比赛（宣讲会将在正式比赛的前一个星期左右举办，同学们还有一周时间熟悉软件）</li>
                            </ul>
                        <li>正式举办比赛的时间会在群里公布，请大家务必要参加</li>
                        <li>宣布获奖名单，颁发奖品</li>
                            <ul>
                                <li>一等奖:机械键盘</li>
                                <li>二等奖:充电宝</li>
                                <li>三等奖:金属手机支架</li>
                            </ul>
                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
