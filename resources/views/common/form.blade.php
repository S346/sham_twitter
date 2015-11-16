<div class="row">
    {!! Form::open(['url' => route('tweet.store')]) !!}
        <div class="col-md-10">
            {!! Form::text('body', null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-md-2">
            {!! Form::submit('ツイート', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    {!! Form::close() !!}
</div>