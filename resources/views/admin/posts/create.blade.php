@extends('layouts.admin')

@section('header')
    Create Post
@endsection
@section('content')
    <div class="row">
        {!! Form::open(['method' =>'post', 'action' => 'AdminPostsController@store', 'files' => 'true']) !!}

        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class' =>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category_id', 'Category:') !!}
            {!! Form::select('category_id',['' => 'Chose a category'] + $categories, null, ['class' =>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo_id', 'Upload a Photo', ['class' => 'btn btn-default']) !!}
            {!! Form::file('photo_id', ['hidden']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('content', 'Content:') !!}
            {!! Form::textarea('content', null,['class' =>'form-control', 'rows' => 5]) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Post', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>

    <div class="row">
        @include('partials.form_errors')
    </div>
@endsection
