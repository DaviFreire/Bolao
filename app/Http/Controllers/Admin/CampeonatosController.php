<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Campeonato;
use Illuminate\Validation\Rule;

class CampeonatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaMigalhas = json_encode([
            ["titulo"=>"Home","url"=>route('home')],
            ["titulo"=>"Lista de Campeonatos","url"=>""]
        ]);

        $listaModelo = Campeonato::select('id','descricao','dt_inicial','dt_final')->paginate(20);

        return view('admin.campeonato',compact('listaMigalhas','listaModelo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['owner_id'] = \Auth::user()->id;
        /*echo "<pre>";
        print_r($data);
        die;
        /*$validacao = \Validator::make($data,[
            'descricao' => 'required|string|max:255',
            'dt_inicial' => 'required|date',
            'dt_final' => 'required|date',
        ]);

        if($validacao->fails()){
            return redirect()->back()->withErrors($validacao)->withInput();
        }*/

        Campeonato::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Campeonato::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $validacao = \Validator::make($data,[
            'descricao' => 'required|string|max:255',
            'dt_inicial' => 'required|date',
            'dt_final' => 'required|date',
        ]);

        if($validacao->fails()){
            return redirect()->back()->withErrors($validacao)->withInput();
        }

        Campeonato::find($id)->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Campeonato::find($id)->delete();
        return redirect()->back();
    }
}
