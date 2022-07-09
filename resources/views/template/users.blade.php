<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar bg-dark p-3">
    <div class="container-fluid w-50 justify-content-start">
      <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-light me-2" type="button">Usuários</a>
      <a href="{{ route('posts.index') }}" class="btn btn-sm btn-outline-light me-2" type="button">Posts</a>
    </div>
  </nav>

  <div class="container w-50 p-3">
    @yield('body')
  </div>
</body>
</html>