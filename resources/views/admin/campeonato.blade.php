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

    <painel titulo="Lista de Campeonatos">
      <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>


      <tabela-lista
      v-bind:titulos="['#','Descrição','Data Inicial', 'Data Final']"
      v-bind:itens="{{json_encode($listaModelo)}}"
      ordem="desc" ordemcol="1"
      criar="#criar" detalhe="/admin/campeonatodetalhes/" editar="/admin/campeonatos/" deletar="/admin/campeonatos/" token="{{ csrf_token() }}"
      modal="sim"
      ></tabela-lista>
      <div align="center">
        {{$listaModelo}}
      </div>
    </painel>

  </pagina>

  <modal nome="adicionar" titulo="Adicionar">
    <formulario id="formAdicionar" css="" action="{{route('campeonatos.store')}}" method="post" enctype="" token="{{ csrf_token() }}">

      <div class="form-group">
        <label for="name">Descrição</label>
        <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição do Campeonato" value="{{old('descricao')}}">
      </div>

      <div class="form-group">
        <label for="data">Data Inicial</label>
        <input type="date" class="form-control" id="dt_inicial" name="dt_inicial" value="{{old('dt_inicial')}}">
      </div>

      <div class="form-group">
        <label for="data">Data Final</label>
        <input type="date" class="form-control" id="dt_final" name="dt_final" value="{{old('dt_final')}}">
      </div>

    </formulario>
    <span slot="botoes">
      <button form="formAdicionar" class="btn btn-info">Adicionar</button>
    </span>

  </modal>
  <modal nome="editar" titulo="Editar">
    <formulario id="formEditar" v-bind:action="'/admin/campeonatos/' + $store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}">

      <div class="form-group">
        <label for="name">Descrição</label>
        <input type="text" class="form-control" id="descricao" name="descricao" v-model="$store.state.item.descricao" placeholder="Descrição do Campeonato">
      </div>
      <div class="form-group">
        <label for="data">Data Inicial</label>
        <input type="date" class="form-control" id="dt_inicial" name="dt_inicial" v-model="$store.state.item.dt_inicial">
      </div>
      <div class="form-group">
        <label for="data">Data Final</label>
        <input type="date" class="form-control" id="dt_final" name="dt_final" v-model="$store.state.item.dt_final">
      </div>
    </formulario>
    <span slot="botoes">
      <button form="formEditar" class="btn btn-info">Atualizar</button>
    </span>
  </modal>
@endsection
