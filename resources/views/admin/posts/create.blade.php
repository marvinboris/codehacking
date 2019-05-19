@extends('layouts.admin')

@section('content')
    <h1>Create Posts</h1>
    @include('includes.form-errors')
    {!! Form::open([
        'method' => 'post',
        'action' => 'AdminPostsController@store',
        'files' => true
    ]) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', null, [
                'class' => 'form-control'
            ]) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('category_id', 'Category', ['class' => 'control-label']) !!}
            {!! Form::select('category_id', [null => 'Select a Category'] + [], null, [
                'class' => 'form-control'
            ]) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('body', 'Description', ['class' => 'control-label']) !!}
            {!! Form::textarea('body', null, [
                'class' => 'form-control'
            ]) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('photo_id', 'Photo', ['class' => 'control-label']) !!}
            {!! Form::file('photo_id', [
                'class' => 'form-control'
            ]) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Post', ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@endsection