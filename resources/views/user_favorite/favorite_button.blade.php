@if(Auth::user()->is_user_posts($post->id))
    {!! Form::open(['route' => ['unfavorite.post', $post->id]]) !!}
        {!! Form::submit('Unfavorite', ['class' => 'btn btn-success btn-xs btn100']) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['favorite.post', $post->id]]) !!}
        {!! Form::submit('Favorite', ['class' => 'btn btn-info btn-xs btn100']) !!}
    {!! Form::close() !!}
@endif