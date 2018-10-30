@extends('layouts.app')

@section('content')
<pagina tamanho="10">
    <!-- <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas> -->
    <painel titulo="Consultas">

      <div class="row">
          <div class="col-md-4">
            <caixa qtd="" titulo="Artigos" url="" cor="orange" icone="ion ion-pie-graph"></caixa>
          </div>
      </div>
    </painel>

    <painel titulo="Cadastros">

      <div class="row">
          <div class="col-md-4">
            <caixa qtd="{{$totalUsuarios}}" titulo="Usuários" url="{{route('usuarios.index')}}" cor="blue" icone="ion ion-person-stalker"></caixa>
          </div>
      </div>
    </painel>
</pagina>
@endsection
