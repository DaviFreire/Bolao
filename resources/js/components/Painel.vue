<template>
  <div v-bind:class="defineCor">
      <div v-if="titulo" class="card-header">{{titulo}}</div>

      <div class="card-body">
          <slot></slot>
      </div>
  </div>
</template>

<script>
    export default {
        props:['titulo','cor'],
        computed:{
          defineCor: function(){
            return "space card "+ (this.cor || "card-default");
          }
        }
    }
</script>

<style media="screen">
  .blue {
    border-color: #0d4a96;
  }

  .blue > .card-header {
    color: #f7f7f7;
    background-color: #0d4a96;
    border-color: #0d4a96;
  }

  .orange {
    border-color: #e85e0d;
  }

  .orange > .card-header {
    color: #f7f7f7;
    background-color: #e85e0d;
    border-color: #e85e0d;
  }

  .space{
    margin-bottom: 15px;
  }



</style>
