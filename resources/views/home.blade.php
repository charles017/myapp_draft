<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    @auth 
    <h1 class="text-center mt-5">Congratulations!, You're logged in!</h1>
    <form action="/logout" method="POST">
      @csrf
      <div class="row d-flex justify-content-center">
        <div class="col-md-4 mt-5">
          <button>Log out</button>
        </div>
      </div>
    </form>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="column-md-4 mt-5">
          <div class="mt-5" style="border: 3px solid black;">
            <h2 class="mt-3">Create a New Post</h2>
            <form class="mb-3" action="/create-post" method="POST">
              @csrf
              <input class="form-control mt-3 mb-3" type="text" name="title" placeholder="Post Title">
              <div class="mb-3">
                <textarea class="form-control mt-3 mb-3" name="body" rows="3" placeholder="body content..."></textarea>
              </div>
              <button>Save Post</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="column-md-4 mt-5">
          <div class="mt-5" style="border: 3px solid black;">
            <h2 class="mt-3">All Posts</h2>
            @foreach($posts as $post)
            <div style="background-color: rgb(222, 204, 204); padding: 10px; margin: 10px;">
              <h4>{{$post['title']}} by {{$post->user->name}}</h4>
              {{$post['body']}}
              <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
              <form action="/delete-post/{{$post->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button>Delete</button>
              </form>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>


    @else 
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="column-md-4 mt-5">
          <div class="mt-5" style="border: 3px solid black;">
            <h2 class="mt-3">Register</h2>
            <form class="mb-3" action="/register" method="POST">
              @csrf
              <input name="name" type="text" placeholder="name" required>
              <input name="email" type="email" placeholder="email" required>
              <input name="password" type="password" placeholder="password" required>
              <button>Register</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="column-md-4 mt-5">
          <div class="mt-5" style="border: 3px solid black;">
            <h2 class="mt-3">Login</h2>
            <form class="mb-3" action="/login" method="POST">
              @csrf
              <input name="loginname" type="text" placeholder="email" required>
              <input name="loginpassword" type="password" placeholder="password" required>
              <button>Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    @endauth
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>