@extends('layouts.main')
@section('content')
    <div>
        <form action="{{route('postUpdate', $post->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="title" value="{{$post->title}}">
                @error('title')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content">Content</label>
                <textarea class="form-control" name="content" id="content" rows="6" placeholder="content">{{$post->content}}</textarea>
                @error('content')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image">Image</label>
                <input type="text" class="form-control" name="image" id="image" placeholder="image" value="{{$post->image}}">
                @error('image')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="likes">Likes</label>
                <input type="number" class="form-control" name="likes" id="likes" placeholder="likes" value="{{$post->likes}}">
                @error('likes')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category">Category</label>
                <select class="form-select" aria-label="Default select example" name="category">
                    @foreach($categories as $category)
                        <option {{$category->id === $post->category->id ? ' selected': ''}} value={{$category->id}}>{{$category->title}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tags">Tags</label>
                <select class="form-select" multiple aria-label="multiple select example" name="tags[]">
                    @foreach($tags as $tag)
                        <option
                            @foreach($post->tags as $post_tag)
                                {{$tag->id === $post_tag->id ? ' selected': ''}}
                            @endforeach
                            value={{$tag->id}}>{{$tag->title}}</option>
                    @endforeach
                </select>
                @error('tags')
                <p class="text-danger">{{$message}}</p>
                @enderror
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
