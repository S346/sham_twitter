@extends('layout')

@section('title')
    - アカウント設定変更
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            @include('common.profile')
        </div>
        <div class="col-md-8">
            <h1>アカウント設定変更</h1>
            <hr/>
            {!! Form::open(['method' => 'PATCH', 'url' => route('user.update'), 'files' => true]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'ユーザー名:') !!}
                    {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス:') !!}
                    {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', '説明文:') !!}
                    {!! Form::textarea('description', $user->description, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('photo', 'ユーザー画像:') !!}
                    {!! Form::file('photo') !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('設定変更', ['class' => 'btn btn-primary form-control']) !!}
                </div>
            {!! Form::close() !!}
            <h1>パスワード変更</h1>
            <hr/>
            {!! Form::open(['url' => route('password.update')]) !!}
                <div class="form-group">
                    {!! Form::label('old_password', '現在のパスワード:') !!}
                    {!! Form::password('old_password', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password', '新しいパスワード:') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password_confirmation', '新しいパスワードを再入力:') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('パスワード変更', ['class' => 'btn btn-primary form-control']) !!}
                </div>
            {!! Form::close() !!}

            <h1>アカウント削除</h1>
            <hr/>
            {!! Form::open(['method' => 'DELETE', 'url' => route('user.destroy')]) !!}
                {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection