@extends('layouts.ceo')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <a href="{{ route('showEnterForm')}}">
                        <button  class="btn btn-primary" >{{__('Login')}}</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
