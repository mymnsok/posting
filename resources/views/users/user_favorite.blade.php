@extends('layouts.app')

@section('content')
    @if(Auth::user()->id === $user->id)
        <div class="row">
            <div class="col-md-offset-3 col-md-6 col-xs-12">
                @if (count($posts) > 0)
                    @include('posts.posts', ['posts' => $posts])
                @else
                    <p>コメントはありません。</p>
                @endif
            </div>
        </div>
    @else
        @include('commons.not_access')
    @endif
@endsection