@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <h1 class="logo">Posting</h1>
            <p><small>What is OriginPosts?<br>
            OriginPosts is a simple bulletin board.</small></p>
            
            {!! link_to_route('signup.get', 'Sign up', null, ['class' => 'btn btn-primary btn-lg auth_btn']) !!}
            {!! link_to_route('login.get', 'Log in', null, ['class' => 'btn btn-default btn-lg auth_btn']) !!}
        </div>
    </div>
@endsection