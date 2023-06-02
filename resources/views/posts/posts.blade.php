@extends('layouts.main')
@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Likes</th>
            <th scope="col">Category id</th>
            <th scope="col">Is published</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <th scope="row"><a href="{{route('postShow', $post->id)}}">{{$post->id}}</a></th>
                <td>{{$post->title}}</td>
                <td>{{$post->content}}</td>
                <td>{{$post->likes}}</td>
                <td>{{$post->category_id}}</td>
                <td>{{$post->is_published}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary" href="{{route('postCreate')}}">Add new</a>
@endsection
