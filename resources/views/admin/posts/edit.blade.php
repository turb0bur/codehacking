@extends('layouts.admin')
@include('partials.tinymce_editor')
@section('header')
    Edit Post
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-4">
            <img src="{{$post->photo ? $post->photo->file : $post->photoPlaceholder()}}" alt="{{$post->title}}" class="img-responsive img-rounded">
        </div>
        <div class="col-sm-8">
            {!! Form::model($post, ['method' =>'patch', 'action' => ['AdminPostsController@update', $post->slug], 'files' => 'true']) !!}
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
                {!! Form::textarea('content', null,['class' =>'form-control', 'rows' => 15]) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update Post', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}

            {!! Form::open(['method' => 'delete', 'action' => ['AdminPostsController@destroy', $post->slug]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete Post', ['class' => 'btn btn-danger']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="row">
        @include('partials.form_errors')
    </div>
@endsection
