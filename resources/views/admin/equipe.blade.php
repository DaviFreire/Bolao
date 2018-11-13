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

    <painel titulo="Lista de Usuários">
      <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>


      <tabela-lista
      v-bind:titulos="['#','Nome']"
      v-bind:itens="{{json_encode($listaModelo)}}"
      ordem="desc" ordemcol="1"
      criar="#criar" detalhe="/admin/equipe/" editar="/admin/equipe/" deletar="/admin/equipe/" token="{{ csrf_token() }}"
      modal="sim"

      ></tabela-lista>
      <div align="center">
        {{$listaModelo}}
      </div>
    </painel>

  </pagina>

  <modal nome="adicionar" titulo="Adicionar">
    <formulario id="formAdicionar" css="" action="{{route('equipes.store')}}" method="post" enctype="" token="{{ csrf_token() }}">

      <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Nome da Equipe" value="{{old('descricao')}}">
      </div>

    </formulario>
    <span slot="botoes">
      <button form="formAdicionar" class="btn btn-info">Adicionar</button>
    </span>

  </modal>
  <modal nome="editar" titulo="Editar">
    <formulario id="formEditar" v-bind:action="'/admin/equipe/' + $store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}">

      <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" id="descricao" name="descricao" v-model="$store.state.item.descricao" placeholder="Nome da Equipe">
      </div>
    </formulario>
    <span slot="botoes">
      <button form="formEditar" class="btn btn-info">Atualizar</button>
    </span>
  </modal>
  <modal nome="detalhe" v-bind:titulo="$store.state.item.name">
    <p>@{{$store.state.item.descricao}}</p>
  </modal>
@endsection
