@extends('layouts.main')
@section('content')
    <div>
        <form action="{{route('postStore')}}" method="post">
            @csrf
            <div class="mb-3">
                <input type="number" class="form-control" name="id" id="id" placeholder="id">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="title" id="title" placeholder="title">
            </div>
            <div class="mb-3">
                <textarea class="form-control" name="content" id="content" rows="6" placeholder="content"></textarea>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="image" id="image" placeholder="image">
            </div>
            <div class="mb-3">
                <input type="number" class="form-control" name="likes" id="likes" placeholder="likes">
            </div>
            <div class="mb-3">
                <label for="category_id">Category id</label>
                <input type="number" class="form-control" name="category_id" id="category_id" placeholder="category id">
            </div>
            <div class="mb-3 form-check">
                <label class="form-check-label" for="is_published">Is published</label>
                <input type="checkbox" class="form-check-input" name="is_published" id="is_published" value=1>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a class="btn btn-primary" href="{{route('posts')}}">Back</a>
        </form>
    </div>
@endsection
