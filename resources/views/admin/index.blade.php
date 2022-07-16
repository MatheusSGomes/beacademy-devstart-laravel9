@extends('template.users')
@section('title', 'Listagem de usuários')
@section('body')

<div class="justify-content-center m-5">
  <div class="card" style="width: 18rem;">
    <img src="{{ asset('storage/dashboard.png') }}" class="card-img-top" alt="Dashboard">
    <div class="card-body">
      <h5 class="card-title">Bem vindo ao Dashboard</h5>
      <p class="card-text">#paylivre #be.academy #laravel</p>
    </div>
  </div>
</div>
@endsection