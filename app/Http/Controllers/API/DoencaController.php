<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Doenca;
use Illuminate\Http\Request;

class DoencaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($limit = null)
    {
        //$doencas = Doenca::paginate($limit == null ? 10 : $limit);
        $doencas = Doenca::all();
        return response([
            'doencas' => $doencas], 200
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
            'title' => 'required|max:300|min:3',
        ]);

        $doenca = Doenca::create($data);

        if ($doenca) {
            return response([
                'message' => 'Doença cadastrado!'], 201
            );
        } else {
            return response([
                'message' => 'Falha ao cadastrar doença'], 412
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doenca  $doenca
     * @return \Illuminate\Http\Response
     */
    public function show(Doenca $doenca)
    {
        return response([
            'doenca' => $doenca], 200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doenca  $doenca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doenca $doenca)
    {
        $data = $request->validate([
            'title' => 'required|max:300|min:3',
        ]);

        $doenca->update($data);

        if ($doenca) {
            return response([
                'message' => 'Atualização feita com sucesso!'
            ], 204);
        } else {
            return response([
                'message' => 'Falha ao atualizar'
            ], 412);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doenca  $doenca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doenca $doenca)
    {
        //
    }
}
