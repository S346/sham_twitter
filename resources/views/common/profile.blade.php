<div class="thumbnail">
    @if($user->photo)
        {!! Html::image('images/'.$user->photo) !!}
    @else
        {!! Html::image('images/no_image.png') !!}
    @endif
    <div class="caption">
        <h3>{{ $user->name }}</h3>

        <p>{{ $user->description }}</p>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>ツイート</th>
            <th>フォロー</th>
            <th>フォロワー</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $user->tweets->count() }}</td>
            <td>{{ $user->friends->count() }}</td>
            <td>{{ $user->friend_users->count() }}</td>
        </tr>
        </tbody>
    </table>
        @if($user->id == Auth::user()->id)
        @elseif(Auth::user()->friends->where('friend_user_id', $user->id)->first())
            {!! Form::open(['url' => route('friend.destroy')]) !!}
                {!! Form::hidden('friend_user_id', $user->id, ['class' => 'form-control']) !!}
                {!! Form::submit('フォロー解除', ['class' => 'btn btn-danger form-control']) !!}
            {!! Form::close() !!}
        @else
            {!! Form::open(['url' => route('friend.store')]) !!}
                {!! Form::hidden('friend_user_id', $user->id, ['class' => 'form-control']) !!}
                {!! Form::submit('フォロー', ['class' => 'btn btn-primary form-control']) !!}
            {!! Form::close() !!}
        @endif
</div>