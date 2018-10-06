@extends('layouts.ceo')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header" style="text-align:center;">{{ __('请填写队伍信息') }}</div>
                    @if(Session::has('msg'))
                        <div class="alert alert-success alert-dismissible" role="alert">{{Session::get('msg')}}<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('showSubjectForm') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="student_id" class="col-md-4 col-form-label text-md-right">{{__('学号')}}</label>
                                <div class="col-md-6">
                                    <input  type="text" name="student_id" id="student_id" class="form-control {{ $errors->has('student_id') ? ' is-invalid' : '' }}" value="{{ old('student_id') }}" autofocus >
                                    @if ($errors->has('studentA_id'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('student_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone_num" class="col-md-4 col-form-label text-md-right">{{__('手机号码')}}</label>
                                <div class="col-md-6">
                                    <input type="text" name="phone_num" id="phone_num" class="form-control {{ $errors->has('phone_num') ? ' is-invalid' : '' }}" value="{{old('phone_num')}}">
                                    @if ($errors->has('phone_num'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone_num') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="subject" class="col-md-4 col-form-label text-md-right">{{__('赛题')}}</label>
                                <div class="col-md-6">
                                    <select name="subject" id="subject" class="form-control {{ $errors->has('subject') ? ' is-invalid' : '' }}"  >
                                        <option value="">请选择题目</option>
                                        <option value="0">A</option>
                                        <option value="1">B</option>
                                        <option value="2">C</option>
                                        <option value="3">D</option>
                                        <option value="4">E</option>
                                    </select>
                                    @if ($errors->has('subject'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
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
                                                    <label class="modal-title" id="formModalLabel">{{__('是否提交信息呢~~')}}</label>
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
