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
  <div class="container w-75 p-3">
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <div class="navbar-collapse" id="navbarSupportedContent">
            <div class="container">
                <div class="row">
                    <div class="col-10">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link text-white" href="/users">Usuários</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="/posts">Posts</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-2">
                        <ul class="navbar-nav mr-auto">
                            @if(Auth::user())
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#">{{ Auth::user()->name }}</a>
                                </li>
                                <li class="nav-item">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-responsive-nav-link class="nav-link text-white" :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Sair') }}
                                        </x-responsive-nav-link>
                                    </form>
                                </li>                        
                            @else
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('login') }}">Entrar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">Registrar-se</a>
                                </li>   
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    @yield('body')

    {{-- @if(!Auth::user())
      @yield('body')
    @endif --}}
  </div> 
</body>

{{-- <body>
  <nav class="navbar bg-dark p-3">
    <div class="container-fluid w-75 justify-content-start">
      <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-light me-2" type="button">Usuários</a>
      <a href="{{ route('posts.index') }}" class="btn btn-sm btn-outline-light me-2" type="button">Posts</a>
    </div>
  </nav>

  <div class="container w-75 p-3">
    @yield('body')
  </div>
</body> --}}
</html>