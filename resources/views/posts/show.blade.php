@extends('template.users')
@section('title',"Listagem de postagem do $user->name")
@section('body')
  <h1>Postagens do {{$user->name}}</h1>
  @foreach($posts as $post)

    <div class="mb-5 mt-3">
      <label class="form-label"><b>Identificação Nº: </b>{{$post->id}}</label>
      <br>

      <label class="form-label"><b>Status: </b>{{$post->active?'Ativo':'Inativo'}}</label>
      <br>

      <label class="form-label"><b>Título: </b>{{$post->title}}</label>
      <br>

      <label class="form-label"><b>Postagem: </b><br></label>
      <textarea class="form-control" rows="3">{{$post->post}}</textarea>
    </div>

  @endforeach
@endsection