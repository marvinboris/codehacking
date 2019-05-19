@extends('layouts.admin')

@section('content')
    <h1>Edit Users</h1>
    @include('includes.form-errors')
    <div class="row">
            <div class="col-sm-3">
                <img src="{{ $user->photo ? $user->photo->path : 'http://placehold.it/400x400' }}" alt="User photo" class="img-responsive img-rounded">
            </div>
            <div class="col-sm-9">
                {!! Form::model($user, [
                    'method' => 'patch',
                    'action' => ['AdminUsersController@update', $user->id],
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
                        {!! Form::submit('Update User', ['class' => 'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}

                {!! Form::model($user, [
                    'method' => 'delete',
                    'action' => ['AdminUsersController@destroy', $user->id]
                ]) !!}
                    <div class="form-group">
                        {!! Form::submit('Delete User', ['class' => 'btn btn-danger']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
    </div>
@endsection