@extends('layouts.main')
@section('content')
    @foreach($posts as $post)
        <p>{{$post->title}}</p>
    @endforeach
@endsection
