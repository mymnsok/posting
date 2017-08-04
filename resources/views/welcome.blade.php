@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-xs-4">
                {!! Form::open(['route' => 'posts.store']) !!}
                    <div class="form-group">
                      {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '5']) !!}
                    </div>
                    {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                {!! Form::close() !!}
            </aside>
            <div class="col-xs-8">
                @if (count($posts) > 0)
                    @include('posts.posts', ['posts' => $posts])
                @endif
            </div>
        </div>
    @else
    <div class="center jumbotron">
        <div class="text-center">
            <h1 class="logo">Posting</h1>
            <p><small>What is OriginPosts?<br>
            OriginPosts is a simple bulletin board.</small></p>
            
            {!! link_to_route('signup.get', 'Sign up', null, ['class' => 'btn btn-primary btn-lg auth_btn']) !!}
            {!! link_to_route('login.get', 'Log in', null, ['class' => 'btn btn-default btn-lg auth_btn']) !!}
        </div>
    </div>
    @endif
@endsection