<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Campeonato;

class CampeonatoDetalheController extends Controller
{
    /**
     * Mostra as opções de detalhes do campeonato
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Campeonato = Campeonato::find($id);
        $listaMigalhas = json_encode([
            ["titulo"=>"Home","url"=>route('home')],
            ["titulo"=>"Lista de Campeonatos","url"=>route('campeonatos.index')],
            ["titulo"=>"Detalhes {$Campeonato['descricao']}","url"=>""]
        ]);

        //$listaModelo = Campeonato::select('id','descricao','dt_inicial','dt_final')->paginate(20);
        return view('admin.campeonatodetalhe',compact('listaMigalhas'));
    }
}
