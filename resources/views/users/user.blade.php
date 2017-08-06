@extends('layouts.app')

@section('content')
@if(Auth::user()->id === $user->id)
<div class="row">
    <aside class="col-md-4 col-xs-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 500) }}" alt="">
            </div>
        </div>
        <h3 class="panel-title">{{ $user->name }}</h3>
    </aside>
    <div class="col-md-8 col-xs-12">
        @if (count($posts) > 0)
            @include('posts.posts', ['id' => $user->id])
        @else
            <p>コメントはありません。</p>
        @endif
    </div>
</div>
@else
    @include('commons.not_access')
@endif
@endsection