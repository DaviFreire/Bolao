<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Equipe;
use Illuminate\Validation\Rule;

class EquipeController extends Controller
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
        ["titulo"=>"Lista de Equipes","url"=>""]
      ]);

      $listaModelo = Equipe::select('id','descricao')->paginate(20);

      return view('admin.equipe',compact('listaMigalhas','listaModelo'));
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
      $validacao = \Validator::make($data,[
        'descricao' => 'required|string|min:2',
      ]);

      if($validacao->fails()){
        return redirect()->back()->withErrors($validacao)->withInput();
      }

      Equipe::create($data);
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
        return Equipe::find($id);
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
        'descricao' => 'required|string|min:2',
      ]);



      if($validacao->fails()){
        return redirect()->back()->withErrors($validacao)->withInput();
      }

      Equipe::find($id)->update($data);
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
      Equipe::find($id)->delete();
      return redirect()->back();
    }
}
