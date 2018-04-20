@extends('layouts.ceo')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-6 ">{{__('报名总人数：')}}{{$count}}</div>
        <div class="col-md-6"></div>
    </div>
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