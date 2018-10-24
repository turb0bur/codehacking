@extends('layouts.admin')

@section('header')
    Media
@endsection

@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Created</th>
        </tr>
        </thead>
        <tbody>

        @if($photos)
            @foreach($photos as $photo)
                <tr>
                    <td>{{$photo->id}}</td>
                    <td><img style="height: 100px" class="img-rounded img-thumbnail" src="{{!file_exists($photo->file) ? $photo->file : 'http://placehold.it/150x100'}}" alt=""></td>
                    <td>{{$photo->created_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection