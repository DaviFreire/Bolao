@extends('layouts.app')

@section('content')
  <pagina tamanho="12">

    @if($errors->all())
      <div class="alert alert-danger alert-dismissible text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        @foreach ($errors->all() as $key => $value)
          <li><strong>{{$value}}</strong></li>
        @endforeach
      </div>
    @endif
    <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>
    
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="equipes-tab" data-toggle="tab" href="#equipes" role="tab" aria-controls="equipes" aria-selected="true">Times</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="jogos-tab" data-toggle="tab" href="#jogos" role="tab" aria-controls="jogos" aria-selected="false">Jogos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="participantes-tab" data-toggle="tab" href="#participantes" role="tab" aria-controls="participantes" aria-selected="false">Participantes</a>
      </li>
    </ul>

    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="equipes-tab">
        
      </div>

      <div class="tab-pane fade" id="perfil" role="tabpanel" aria-labelledby="profile-tab">
        
      </div>

      <div class="tab-pane fade" id="perfil" role="tabpanel" aria-labelledby="profile-tab">

      </div>
    </div>

  </pagina>
@endsection
