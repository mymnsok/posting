<ul> 
@foreach ($posts as $post)

    <?php $user = $post->user; ?>
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
                {{$user->name}}　<span class="text-muted">posted at {{ $post->created_at }}</span>
            </div>
            <div>
                {!! nl2br(e($post->content)) !!}
            </div>
            <div class="btn-toolbar">
                <div class="btn-group">
                    @include('user_favorite.favorite_button')
                </div>
                <div class="btn-group">
                    @if(Auth::user()->id === $user->id)
                        {!! link_to_route('posts.edit', 'Edit', ['id' => $post->id], ['class' => 'btn btn-default btn-xs btn100']) !!}
                    @endif
                </div>
            </div>
        </div>
    </li>

@endforeach
</ul>
{!! $posts->render() !!}