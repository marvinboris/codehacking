@extends('layouts.admin')

@section('content')
    <h1>Create Users</h1>
    @include('includes.form-errors')
    {!! Form::open([
        'method' => 'post',
        'action' => 'AdminUsersController@store',
        'files' => true
    ]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
            {!! Form::text('name', null, [
                'class' => 'form-control'
            ]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'E-Mail address', ['class' => 'control-label']) !!}
            {!! Form::email('email', null, [
                'class' => 'form-control'
            ]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
            {!! Form::password('password', [
                'class' => 'form-control'
            ]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('role_id', 'Role', ['class' => 'control-label']) !!}
            {!! Form::select('role_id', [null => 'Select a role'] + $roles, null, [
                'class' => 'form-control'
            ]) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('is_active', 'Status', ['class' => 'control-label']) !!}
            {!! Form::select('is_active', [null => 'Select a status'] + [0 => 'Inactive', 1 => 'Active'], null, [
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
            {!! Form::submit('Create User', ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@endsection