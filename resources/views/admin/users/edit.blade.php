@extends ('layouts.admin')

@section('header')
    Edit user
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-3">
            <img src="{{$user->photo ? $user->photo->file: 'http://placehold.it/400x400'}}" alt="{{$user->name}}" class="img-responsive img-rounded">
        </div>
        <div class="col-sm-9">
            {!! Form::model($user,['method' =>'patch', 'action' => ['AdminUsersController@update', $user->id], 'files' => 'true']) !!}

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
                {!! Form::select('is_active', [0 => 'Not Active', 1 => 'Active'], null, ['class' =>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id', null, ['class' =>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class' =>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update User', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}

            {!! Form::open(['method' => 'delete', 'action' => ['AdminUsersController@destroy', $user->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete User', ['class' => 'btn btn-danger']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row">
        @include('partials.form_errors')
    </div>
@endsection