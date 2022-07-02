@extends('template.users')
@section('title', $title)

@section('body')
  <h1>Usuario {{ $user->name }}</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Data de cadastro</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <th scope="row">{{ $user->id }}</th>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ date('d/m/Y - H:i', strToTime($user->created_at))  }}</td>
          <td>
            <a href="" class="btn btn-warning btn-sm">Editar</a>
            <a href="" class="btn btn-danger btn-sm">Apagar</a>
          </td>
        </tr>
    </tbody>
  </table>
@endsection