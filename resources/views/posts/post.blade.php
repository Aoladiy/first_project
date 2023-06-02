@extends('layouts.main')
@section('content')
    <table class="table">
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
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->content}}</td>
            <td>{{$post->likes}}</td>
            <td>{{$post->category_id}}</td>
            <td>{{$post->is_published}}</td>
        </tr>
        </tbody>
    </table>
    <a class="btn btn-primary" href="{{route('posts')}}">Back</a>
    <a class="btn btn-primary" href="{{route('postEdit', $post->id)}}">Edit</a>
    <form style="text-align: center" action="{{route('postDelete', $post->id)}}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection
