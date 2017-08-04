@extends('layouts.app')

@section('content')
<div class="row">
    <aside class="col-xs-offset-3 col-xs-6">
    {!! Form::model($post, ['route' => ['posts.update', $post->id] , 'method' => 'put']) !!}
        <div class="form-group">
          {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '10']) !!}
        </div>
        {!! Form::submit('Update', ['class' => 'btn btn-primary btn-block']) !!}
    {!! Form::close() !!}
    </div>
</div>
@endsection