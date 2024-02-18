<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <?php include '../resources/components/navbar.blade.php'; ?>
    <div class="container-fluid py-2">
        <h2 class="text-center">EDIT POST</h2>
        <form class="d-flex flex-column gap-2" action="/edit-post/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" class="p-2" name="title" placeholder="Title" value="{{ $post->title }}" />
            <textarea name="body" placeholder="Content" class="p-2" id="body" cols="30" rows="5">{{ $post->body }}</textarea>
            <button class="btn btn-primary">Done</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
