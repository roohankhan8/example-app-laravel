<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @auth
        <p>Congrats, you are logged in</p>
        <form action="/logout" method="POST">
            @csrf
            <button>Logout</button>
        </form>
        <div>
            <h2>Create post</h2>
            <form action="/create-post" method="POST">
                @csrf
                <input type="text" name="title" placeholder="Title">
                <textarea name="body" placeholder="Content" id="body" cols="30" rows="10"></textarea>
                <button>Post</button>
            </form>
        </div>
        <div>
            <h2>All posts</h2>
            @foreach ($posts as $post)
                <div style="border: 2px solid black">
                    <h3>{{ $post['title'] }} by {{$post->user->name}}</h3>
                    {{ $post['body'] }}
                    <p><a href="/edit-post/{{ $post->id }}">Edit</a></p>
                    <form action="/delete-post/{{ $post->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <div>
            <h1>Register</h1>
            <form action="/register" method="POST">
                @csrf
                <input type="text" placeholder="Full Name" name="name">
                <input type="email" placeholder="Email" name="email">
                <input type="password" placeholder="Password" name="password">
                <button>Register</button>
            </form>
        </div>
        <div>
            <h1>Login</h1>
            <form action="/login" method="POST">
                @csrf
                <input type="email" placeholder="Email" name="loginEmail">
                <input type="password" placeholder="Password" name="loginPassword">
                <button>Login</button>
            </form>
        </div>
    @endauth
</body>

</html>
