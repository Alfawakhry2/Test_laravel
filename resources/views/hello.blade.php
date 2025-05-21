
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{"Hello"}}</title>
</head>
<body>

    <h1>{{"Welcome to our community laravel"}}</h1>
    @foreach ($posts as $post)
    {{$post->title}}
    <br>
    {{$post->body}}
    <hr>
    @endforeach
    {{-- <h2>{{"Welcome $fname $lname"}}</h2> --}}
</body>
</html>
