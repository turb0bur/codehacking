@extends ('layouts.admin')

@section('header')
    Create user
@endsection

@section('content')
    {!! Form::open(['method' =>'post', 'action' => 'AdminUsersController@store', 'files' => 'true']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' =>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::text('email', null, ['class' =>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('role_id', 'Role:') !!}
        {!! Form::select('role_id',[''=> 'Choose a role'] + $roles, null, ['class' =>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('is_active', 'Status:') !!}
        {!! Form::select('is_active', [0 => 'Not Active', 1 => 'Active'],0, ['class' =>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('photo_id', 'Upload a Photo', ['class' => 'btn btn-default']) !!}
        {!! Form::file('photo_id', ['hidden']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class' =>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create User', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

    @include('partials.form_errors')

@endsection