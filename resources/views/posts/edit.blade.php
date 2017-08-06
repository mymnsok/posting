@extends('layouts.app')

@section('content')
@if(Auth::user()->id === $post->user_id)
<div class="row">
    <aside class="col-md-offset-3 col-md-6 col-xs-12">
    {!! Form::model($post, ['route' => ['posts.update', $post->id] , 'method' => 'put']) !!}
        <div class="form-group">
          {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '10']) !!}
        </div>
        {!! Form::submit('Update', ['class' => 'btn btn-primary btn-block']) !!}
    {!! Form::close() !!}
    </aside>
    <div class="col-md-offset-3 col-md-6 col-xs-12">
        {!! Form::model($post, ['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
            {!! Form::submit('delete', ['class' => 'btn btn-danger mt20 btn100']) !!}
        {!! Form::close() !!}
    </div>
</div>
@else
    @include('commons.not_access')
@endif
@endsection