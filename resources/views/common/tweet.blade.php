@foreach($tweets as $tweet)
    <div class="panel panel-default">
        <div class="panel-heading">
            @if($tweet->user->photo)
                {!! Html::image('images/'.$tweet->user->photo, '', ['width' => '50', 'height' => '50']) !!}
            @else
                {!! Html::image('images/no_image.png', '', ['width' => '50', 'height' => '50']) !!}
            @endif
            {!! Html::link(route('user.show', $tweet->user->id), $tweet->user->name) !!}
        </div>
        <div class="panel-body">
            {{ $tweet->body }}
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-xs-2">
                    {!! Html::link(route('tweet.show', $tweet->id), $tweet->published_at) !!}
                </div>
                {!! Form::open(['url' => route('tweet.store')]) !!}
                {!! Form::hidden('tweet_id', $tweet->id) !!}
                <div class="col-xs-8">
                    {!! Form::text('body', null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-xs-2">
                    {!! Form::submit('コメント', ['class' => 'btn btn-primary form-control']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @if($tweet->comment->first())
        @foreach($tweet->comment as $comment)
            <div class="row">
                <div class="col-xs-2"></div>
                <div class="col-xs-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            @if($comment->user->photo)
                                {!! Html::image('images/'.$comment->user->photo, '', ['width' => '50', 'height' => '50']) !!}
                            @else
                                {!! Html::image('images/no_image.png', '', ['width' => '50', 'height' => '50']) !!}
                            @endif
                            {!! Html::link(route('user.show', $comment->user->id), $comment->user->name) !!}
                        </div>
                        <div class="panel-body">
                            {{ $comment->body }}
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-xs-2">
                                    {!! Html::link(route('tweet.show', $comment->id), $comment->published_at) !!}
                                </div>
                                {!! Form::open(['url' => route('tweet.store')]) !!}
                                {!! Form::hidden('tweet_id', $comment->id) !!}
                                <div class="col-xs-8">
                                    {!! Form::text('body', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-xs-2">
                                    {!! Form::submit('コメント', ['class' => 'btn btn-primary form-control']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endforeach