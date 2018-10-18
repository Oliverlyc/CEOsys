@extends('layouts.tyds')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header" style="text-align:center;">{{ __('请选择功能') }}</div>
                    @if(Session::has('msg'))
                        <div class="alert alert-success alert-dismissible" role="alert">{{Session::get('msg')}}<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="row">
                            <a href="{{ route('showChangeSubjectForm')}}" style="width:100%">
                                <button  class="btn btn-info" style="width:100%;margin-bottom: 20px;">{{__('1.修改赛题')}}</button>
                            </a>
                        </div>
                        <div class="row">
                            <a href="{{ route('showDeleteTeamForm')}}" style="width:100%">
                                <button  class="btn btn-danger" style="width:100%;margin-bottom: 20px;">{{__('2.删除队伍')}}</button>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
