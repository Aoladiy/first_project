<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
@foreach($posts as $post)
    <div>{{$post->title}}</div><br>
@endforeach
</body>
</html>
