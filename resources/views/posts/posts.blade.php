<ul> 
@foreach ($posts as $post)

    <?php $user = $post->user; ?>
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
                {!! $user->name !!}　<span class="text-muted">posted at {{ $post->created_at }}</span>
            </div>
            <div>
                {!! nl2br(e($post->content)) !!}
            </div>
        </div>
    </li>

@endforeach
</ul>
{!! $posts->render() !!}