@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" />
@endsection

@section('header')
    Upload Photo
@endsection

@section('content')
    {!! Form::open(['method' =>'post', 'action' => 'AdminMediaController@store', 'class' => 'dropzone']) !!}

    {!! Form::close() !!}
@endsection

@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
@endsection