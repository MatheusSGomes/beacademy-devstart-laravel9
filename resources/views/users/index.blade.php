@extends('template.users')
@section('title', 'Listagem de usuários')
@section('body')
  <h1 class="mb-3">Listagem de usuários</h1>

  <a href="{{ route('users.create') }}" class="btn btn-success btn-sm mb-3">Novo Usuário</a>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">Imagem</th>
        <th scope="col">Id</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Data de cadastro</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
        <tr>
          <th scope="row">{{ $user->id }}</th>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ date('d/m/Y - H:i', strToTime($user->created_at))  }}</td>
          <td><a href="{{ route('users.show', $user->id) }}" class="btn btn-primary text-white btn-sm">Visualizar</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection