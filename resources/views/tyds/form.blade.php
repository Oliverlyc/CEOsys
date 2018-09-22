@extends('layouts.tyds')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style="text-align:center;">{{ __('填写报名信息') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('showTYDSForm') }}">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="student_id" class="col-md-4 col-form-label text-md-right">{{__('学号')}}</label>
                            <div class="col-md-6">
                                <input  type="text" name="student_id" id="student_id" class="form-control {{ $errors->has('student_id') ? ' is-invalid' : '' }}" value="{{ old('student_id') }}" autofocus >
                                @if ($errors->has('student_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('student_id') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('姓名') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"  >

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="class" class="col-md-4 col-form-label text-md-right">{{__('班级')}}</label>
                            <div class="col-md-6">
                                <input  type="text" name="class" id="class" class="form-control {{ $errors->has('class') ? ' is-invalid' : '' }}" value="{{ old('class') }}" autofocus >
                                @if ($errors->has('class'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('class') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{__('性别')}}</label>
                            <div class="col-md-6">
                            <select name="gender" id="gender" class="form-control {{ $errors->has('gender') ? ' is-invalid' : '' }}">
                                    <option value="">请选择性别</option>
                                    <option value="1">男</option>
                                    <option value="0">女</option>
                                </select>
                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{--<div class="form-group row">--}}
                            {{--<label for="college" class="col-md-4 col-form-label text-md-right">{{__('学院')}}</label>--}}
                            {{--<div class="col-md-6">--}}
                            {{--<select name="college" id="college" class="form-control {{ $errors->has('college') ? ' is-invalid' : '' }}">--}}
                                    {{--<option value="请选择学院">请选择学院</option>--}}
                                    {{--<option value="通院">通院</option>--}}
                                    {{--<option value="电光院">电光院</option>--}}
                                {{--</select>--}}
                                {{--@if ($errors->has('college'))--}}
                                    {{--<span class="invalid-feedback">--}}
                                        {{--<strong>{{ $errors->first('college') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="form-group row">
                            <label for="major" class="col-md-4 col-form-label text-md-right">{{__('专业')}}</label>
                            <div class="col-md-6">    
                                <select name="major" id="major" class="form-control {{ $errors->has('major') ? ' is-invalid' : '' }}"  >
                                    <option value="">请选择专业</option>
                                    <option value="通信工程">通信工程</option>
                                    <option value="信息工程">信息工程</option>
                                    <option value="广播电视工程">广播电视工程</option>
                                    <option value="电子信息工程">电子信息工程</option>
                                </select>
                                @if ($errors->has('major'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('major') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right">{{__('手机号码')}}</label>
                            <div class="col-md-6">
                                <input type="text" name="tel" id="tel" class="form-control {{ $errors->has('tel') ? ' is-invalid' : '' }}" value="{{old('tel')}}">
                                @if ($errors->has('tel'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('tel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="direction" class="col-md-4 col-form-label text-md-right">{{__('方向')}}</label>
                            <div class="col-md-6">
                                <select name="direction" id="direction" class="form-control {{ $errors->has('direction') ? ' is-invalid' : '' }}"  >
                                    <option value="">请选择方向</option>
                                    <option value="模电">模电</option>
                                    <option value="单片机">单片机</option>
                                    <option value="FPGA">FPGA</option>
                                </select>
                                @if ($errors->has('direction'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('direction') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}

                        {{-- <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}

                        {{-- <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div> --}}
                        
                        {{-- <div class="form-group row ">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="width: 100%;">
                                    {{ __('确认') }}
                                </button>
                            </div>
                        </div> --}}
                        <div class="form-group row ">
                            <div class="col-md-6 offset-md-4">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">{{__('提交信息')}}</button>
                                <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <p>Tip</p>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <label class="modal-title" id="formModalLabel">{{__('是否提交报名信息呢~~')}}</label>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                                <input type="submit" class="btn btn-primary"></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
