<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Laravel Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    @auth
        <?php include '../resources/components/navbar.php'; ?>
        <form class="nav-item" action="/logout" method="POST">
            @csrf
            <button class="btn btn-danger">Logout</button>
        </form>
        <a href="/dashboard" class="btn btn-info">Dashboard</a>
        <div class="container-fluid">
            <div class="p-2">
                <h2 class="text-center">CREATE POST</h2>
                <form class="d-flex flex-column gap-2" action="/create-post" method="POST">
                    @csrf
                    <input type="text" class="p-2" name="title" placeholder="Title" />
                    <textarea name="body" placeholder="Content" class="p-2" id="body" cols="30" rows="5"></textarea>
                    <button class="btn btn-primary">Post</button>
                </form>
            </div>
            <hr>
            <h2 class="text-center">ALL POSTS</h2>
            <hr>
            <div class="cards d-flex flex-column gap-4 my-4 align-items-center justify-content-center">
                @foreach ($posts as $post)
                    <div class="card shadow" style="width: 100%">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post['title'] }} by {{ $post->user->name }}</h5>
                            <p class="card-text">{{ $post['body'] }}</p>
                            @if (auth()->user()->id === $post->user_id)
                                <div class="d-flex gap-1 justify-content-center align-items-center">
                                    <a class="btn btn-success" href="/edit-post/{{ $post->id }}">Edit</a>
                                    <form class="card-link" action="/delete-post/{{ $post->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div>
        @else
            <div class="container-fluid d-flex flex-column gap-2 border">
                <div class="border p-2 my-2">
                    <h1 class="text-center">Register</h1>
                    <form class="d-flex flex-column gap-2" action="/register" method="POST">
                        @csrf
                        <input type="text" placeholder="Full Name" name="name">
                        <input type="email" placeholder="Email" name="email">
                        <input type="password" placeholder="Password" name="password">
                        <button class="btn btn-primary">Register</button>
                    </form>
                </div>
                <div class="border p-2 my-2">
                    <h1 class="text-center">Login</h1>
                    <form class="d-flex flex-column gap-2" action="/login" method="POST">
                        @csrf
                        <input type="email" placeholder="Email" name="loginEmail">
                        <input type="password" placeholder="Password" name="loginPassword">
                        <button class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        @endauth
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
</body>

</html>
