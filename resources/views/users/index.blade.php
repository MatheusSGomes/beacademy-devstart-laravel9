@extends('template.users')
@section('title', 'Listagem de usuários')
@section('body')
  <h1 class="mb-3 mt-3">Listagem de usuários</h1>

  @if(session()->has('create'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <p>{{ session()->get('create') }}</p>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  @if(session()->has('edit'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <p>{{ session()->get('edit') }}</p>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  @if(session()->has('destroy'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <p>{{ session()->get('destroy') }}</p>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  
  <div class="container">
    <div class="row">
      <div class="col-sm mt-2 mb-5">
        <a href="{{ route('users.create') }}" class="btn btn-success btn-sm mb-3">Novo Usuário</a>
      </div>

      <div class="col-sm mt-2 mb-5">
        <form action="{{ route('users.index') }}" method="GET">
          <div class="input-group">
            <input type="search" class="form-control rounded" name="search" id="search" />
            <button type="submit" class="btn btn-outline-primary">Pesquisar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">Foto</th>
        <th scope="col">Id</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Postagens</th>
        <th scope="col">Data de cadastro</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
        <tr>

          @if($user->image)
            <th><img src="{{ asset('storage/'.$user->image ) }}" alt="{{ "Foto de ".$user->name }}" title="{{ "Foto de ".$user->name }}" width="50px" height="50px" class="rounded-circle" ></th>
          @else
            <th><img src="{{ asset('storage/profile/avatar.jpg' ) }}" alt="{{ "Avatar de ".$user->name }}" title="{{ "Avatar de ".$user->name }}" width="50px" height="50px" class="rounded-circle"></th>
          @endif

          <th scope="row">{{ $user->id }}</th>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>
            <a href="{{ route('posts.show', $user->id)}}" class="btn btn-outline-dark btn-sm">Posts: {{ $user->posts->count()}}</a>
          </td>
          <td>{{ date('d/m/Y - H:i', strToTime($user->created_at))  }}</td>
          <td><a href="{{ route('users.show', $user->id) }}" class="btn btn-primary text-white btn-sm">Visualizar</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <div class="justify-content-center pagination">
    {{ $users->links('pagination::bootstrap-4') }}
  </div>
@endsection