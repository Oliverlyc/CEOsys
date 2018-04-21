@extends('layouts.ceo')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-6 ">{{__('报名总人数：')}}{{$count}}
        <a href="{{ route('getList') }}"> 
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
                <th>{{__('学院')}}</th>
                <th>{{__('专业')}}</th>
                <th>{{__('联系方式')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $index => $member)
                <tr>
                    <td>{{$index+1}}</th>
                    <td>{{$member['student_id']}}</th>
                    <td>{{$member['name']}}</th>
                    <td>{{$member['college']}}</th>
                    <td>{{$member['major']}}</th>
                    <td>{{$member['phone_num']}}</th>
                </tr>
            @endforeach
        </tbody>
        
    </table>
</div>

@endsection