@extends('layouts.ceo')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                @if(Session::has('msg'))
                    <div class="alert alert-success alert-dismissible" role="alert">{{Session::get('msg')}}<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
                @endif
                <div class="card-body">
                    <a href="{{ route('showEnterForm')}}">
                        <button  class="btn btn-primary" >{{__('我要报名比赛')}}</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
