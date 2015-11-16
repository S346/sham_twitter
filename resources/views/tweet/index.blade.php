@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-4">
            @include('common.profile')
        </div>
        <div class="col-md-8">
            <h1>ツイート</h1>
            <hr/>
            @include('common.form')
            <br/>
            @include('common.tweet')
        </div>
    </div>
@endsection