<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pesquisador;
use Illuminate\Http\Request;

class PesquisadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesquisadors = Pesquisador::all();
        return response([
            'pesquisadores' => $pesquisadors], 200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|max:300|min:2',
            'cpf' => 'required|max:11|min:11',
            'data_nascimento' => 'required|date',
            'uf_id' => 'exists:ufs,id',
            'municipio_id' => 'exists:municipios,id',
            'sexo_id' => 'exists:sexos,id',
        ]);

        Pesquisador::create($data);
     
        return response([
            'message' => 'Pesquisador cadastrado com sucesso!'], 201
        );
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pesquisador  $pesquisador
     * @return \Illuminate\Http\Response
     */
    public function show(Pesquisador $pesquisador)
    {
        return response([
            'pesquisador' => $pesquisador
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pesquisador  $pesquisador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pesquisador $pesquisador)
    {
        $data = $request->validate([
            'nome' => 'required|max:300|min:2',
            'cpf' => 'required|max:11|min:11',
            'data_nascimento' => 'required|date',
            'sexo_id' => 'exists:sexos,id',
            'uf_id' => 'exists:ufs,id',
            'municipio_id' => 'exists:municipios,id',

        ]);

        $pesquisador->update($data);

        return response([
            'message' => 'Pesquisador atualizado com sucesso!'], 200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pesquisador  $pesquisador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesquisador $pesquisador)
    {
        //
    }
}
