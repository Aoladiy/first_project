@extends('layouts.main')
@section('content')
    <div>
        <form action="{{route('postUpdate', $post->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="id">ID</label>
                <input type="number" class="form-control" name="id" id="id" placeholder="id" value="{{$post->id}}">
            </div>
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="title" value="{{$post->title}}">
            </div>
            <div class="mb-3">
                <label for="content">Content</label>
                <textarea class="form-control" name="content" id="content" rows="6" placeholder="content">{{$post->content}}</textarea>
            </div>
            <div class="mb-3">
                <label for="image">Image</label>
                <input type="text" class="form-control" name="image" id="image" placeholder="image" value="{{$post->image}}">
            </div>
            <div class="mb-3">
                <label for="likes">Likes</label>
                <input type="number" class="form-control" name="likes" id="likes" placeholder="likes" value="{{$post->likes}}">
            </div>
            <div class="mb-3">
                <label for="category_id">Category id</label>
                <input type="number" class="form-control" name="category_id" id="category_id" placeholder="category id" value="{{$post->category_id}}">
            </div>
            <div class="mb-3 form-check">
                <label class="form-check-label" for="is_published">Is published</label>
                @if($post->is_published === 1)
                    <input type="checkbox" class="form-check-input" name="is_published" id="is_published" value=1 checked>
                @elseif($post->is_published === 0)
                    <input type="checkbox" class="form-check-input" name="is_published" id="is_published" value=1>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
            <a class="btn btn-primary" href="{{route('postShow', $post->id)}}">Back</a>
        </form>
    </div>
@endsection
