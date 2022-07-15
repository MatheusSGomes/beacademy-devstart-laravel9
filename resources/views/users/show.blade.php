@extends('template.users')
{{-- @section('title', $title) --}}
@section('title', "Usuário")

@section('body')
  <h1>Usuario {{ $user->name }}</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Data de cadastro</th>
        <th scope="col">Visualizar</th>
        <th scope="col">Deletar</th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <th scope="row">{{ $user->id }}</th>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ date('d/m/Y - H:i', strToTime($user->created_at))  }}</td>
          <td>
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Editar</a>
          </td>
          <td>
            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-danger btn-sm">Apagar</button>
            </form>

          </td>
        </tr>
    </tbody>
  </table>
@endsection