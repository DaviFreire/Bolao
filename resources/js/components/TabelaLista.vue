<template>
  <div>

    <div class="row">
      <div class="col">
        <a class="align-middle" v-if="criar && !modal" v-bind:href="criar">Novo Registro</a>
        <modallink v-if="criar && modal" tipo="button" nome="adicionar" titulo="Novo Registro" css=""></modallink>
      </div>
      <div class="col col-md-2 float-right">
        <input type="search" class="form-control mb-4" placeholder="Buscar" v-model="buscar" >
      </div>
    </div>

    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th style="cursor:pointer" v-on:click="ordenaColuna(index)" v-for="(titulo,index) in titulos">{{titulo}}</th>

          <th v-if="detalhe || editar || deletar">Ação</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(item,index) in lista">
          <td v-for="i in item">{{i | formataData}}</td>

          <td v-if="detalhe || editar || deletar">
            <form v-bind:id="index" v-bind:action="deletar + item.id" method="post">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" v-bind:value="token">

              <a v-if="detalhe && !modald" v-bind:href="detalhe + item.id">Detalhe |</a>
              <modallink v-if="detalhe && modald" v-bind:item="item" v-bind:url="detalhe" tipo="link" nome="detalhe" titulo=" Detalhe |" css=""></modallink>


              <a v-if="editar && !modal" v-bind:href="editar"> Editar |</a>
              <modallink v-if="editar && modal" v-bind:item="item" v-bind:url="editar" tipo="link" nome="editar" titulo=" Editar |" css=""></modallink>

              <a href="#" v-if="deletar" v-on:click="executaForm(index)"> Deletar</a>

            </form>
          </td>
        </tr>


      </tbody>

    </table>

  </div>

</template>

<script>
    export default {
      props:['titulos','itens','ordem','ordemcol','criar','detalhe','editar','deletar','token','modal','modald'],
      data: function(){
        return {
          buscar:'',
          ordemAux: this.ordem || "asc",
          ordemAuxCol: this.ordemcol || 0
        }
      },
      methods:{
        executaForm: function(index){
          document.getElementById(index).submit();
        },
        ordenaColuna: function(coluna){
          this.ordemAuxCol = coluna;
          if(this.ordemAux.toLowerCase() == "asc"){
            this.ordemAux = 'desc';
          }else{
            this.ordemAux = 'asc';
          }
        }
      },
      filters: {
        formataData: function(valor){
          if(!valor) return '';
          valor = valor.toString();
          if(valor.split('-').length == 3){
            valor = valor.split('-');
            return valor[2] + '/' + valor[1]+ '/' + valor[0];
          }

          return valor;
        }
      },
      computed:{
        lista:function(){
          let lista = this.itens.data;
          let ordem = this.ordemAux;
          let ordemCol = this.ordemAuxCol;
          ordem = ordem.toLowerCase();
          ordemCol = parseInt(ordemCol);

          if(ordem == "asc"){
            lista.sort(function(a,b){
              if (Object.values(a)[ordemCol] > Object.values(b)[ordemCol] ) { return 1;}
              if (Object.values(a)[ordemCol] < Object.values(b)[ordemCol] ) { return -1;}
              return 0;
            });
          }else{
            lista.sort(function(a,b){
              if (Object.values(a)[ordemCol] < Object.values(b)[ordemCol] ) { return 1;}
              if (Object.values(a)[ordemCol] > Object.values(b)[ordemCol] ) { return -1;}
              return 0;
            });
          }

          if(this.buscar){
            return lista.filter(res => {
              res = Object.values(res);
              for(let k = 0;k < res.length; k++){
                if((res[k] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0){
                  return true;
                }
              }
              return false;

            });
          }


          return lista;
        }
      }
    }
</script>
