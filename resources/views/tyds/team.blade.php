@extends('layouts.ceo')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header" style="text-align:center;">{{ __('请填写队伍信息') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('showTeamForm') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="student_idA" class="col-md-4 col-form-label text-md-right">{{__('队员A学号')}}</label>
                                <div class="col-md-6">
                                    <input  type="text" name="student_idA" id="student_idA" class="form-control {{ $errors->has('student_idA') ? ' is-invalid' : '' }}" value="{{ old('student_idA') }}" autofocus >
                                    @if ($errors->has('student_idA'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('student_idA') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone_numA" class="col-md-4 col-form-label text-md-right">{{__('队员A手机号码')}}</label>
                                <div class="col-md-6">
                                    <input type="text" name="phone_numA" id="phone_numA" class="form-control {{ $errors->has('phone_numA') ? ' is-invalid' : '' }}" value="{{old('phone_numA')}}">
                                    @if ($errors->has('phone_numA'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone_numA') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="student_idB" class="col-md-4 col-form-label text-md-right">{{__('队员B学号')}}</label>
                                <div class="col-md-6">
                                    <input  type="text" name="student_idB" id="student_idB" class="form-control {{ $errors->has('student_idB') ? ' is-invalid' : '' }}" value="{{ old('student_idB') }}" autofocus >
                                    @if ($errors->has('student_id'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('student_idB') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone_numB" class="col-md-4 col-form-label text-md-right">{{__('队员B手机号码')}}</label>
                                <div class="col-md-6">
                                    <input type="text" name="phone_numB" id="phone_numB" class="form-control {{ $errors->has('phone_numB') ? ' is-invalid' : '' }}" value="{{old('phone_numB')}}">
                                    @if ($errors->has('phone_numB'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone_numB') }}</strong>
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
