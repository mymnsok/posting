@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-md-4 col-xs-12">
                {!! Form::open(['route' => 'posts.store']) !!}
                    <div class="form-group">
                      {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '10']) !!}
                    </div>
                    {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                {!! Form::close() !!}
            </aside>
            <div class="col-md-8 col-xs-12">
            @if (count($posts) > 0)
                @include('posts.posts', ['posts' => $posts])
            @else
               <p>コメントはありません。</p>
            @endif
            </div>
        </div>
    @else
    <div class="center jumbotron">
        <div class="text-center">
            <h1 class="logo">Posting</h1>
            <p><small>What is OriginPosts?<br>
            OriginPosts is a simple bulletin board.</small></p>
            
            {!! link_to_route('signup.get', 'Sign up', null, ['class' => 'btn btn-primary btn-lg btn150']) !!}
            {!! link_to_route('login.get', 'Log in', null, ['class' => 'btn btn-default btn-lg btn150']) !!}
        </div>
    </div>
    @endif
@endsection