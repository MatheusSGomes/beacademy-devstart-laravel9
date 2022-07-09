@extends('template.users')
@section('title', 'Listagem de postagens')
@section('body')
  <h1 class="mb-3">Listagem de postagens</h1>

  <a href="" class="btn btn-success btn-sm mb-3">Nova Postagem</a>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Título</th>
        <th scope="col">Postagem</th>
        <th scope="col">Data da postagem</th>
      </tr>
    </thead>
    <tbody>
      @foreach($posts as $post)
        <tr>
          <th scope="row">{{ $post->id }}</th>
          <td>{{ $post->title }}</td>
          <td>{{ $post->post }}</td>
          <td>{{ date('d/m/Y - H:i', strToTime($post->created_at))  }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{-- <div class="justify-content-center pagination">
    {{ $posts->links('pagination::bootstrap-4') }}
  </div> --}}
@endsection