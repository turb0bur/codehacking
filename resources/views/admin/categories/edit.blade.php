@extends('layouts.admin')

@section('header')
    Edit Category
@endsection

@section('content')
    {!! Form::model($category,['method' =>'patch', 'action' => ['AdminCategoriesController@update', $category->id]]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
        {!! Form::text('name', null, ['class' =>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update Category', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

    {!! Form::open(['method' => 'delete', 'action' => ['AdminCategoriesController@destroy', $category->id]]) !!}
    <div class="form-group">
        {!! Form::submit('Delete Category', ['class' => 'btn btn-danger']) !!}
    </div>
    {!! Form::close() !!}
@endsection