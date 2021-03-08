<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return response([
            'pacientes' => $pacientes
        ], 200);
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
            'data_nascimento' => 'required|date',
            'sus' => 'required|max:15|min:15',
            'sexo_id' => 'exists:sexos,id',
            'uf_is' => 'exists:ufs,id',
            'municipio_id' => 'exists:municipios,id',

        ]);

        $paciente = Paciente::create($data);

        if ($paciente) {
            return response([
                'message' => 'Paciente cadastrado com sucesso!'], 201
            );
        } else {
            return response([
                'message' => 'Falha ao cadastrar Paciente'], 412
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        return response([
            'paciente' => $paciente
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        $data = $request->validate([
            'nome' => 'required|max:300|min:2',
            'data_nascimento' => 'required|date',
            'sus' => 'required|max:15|min:15',
            'sexo_id' => 'exists:sexos,id',
            'uf_is' => 'exists:ufs,id',
            'municipio_id' => 'exists:municipios,id',

        ]);

        $paciente->update($data);

        if ($paciente) {
            return response([
                'message' => 'Paciente atualizado com sucesso!'], 201
            );
        } else {
            return response([
                'message' => 'Falha ao atualizado Paciente'], 412
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        //
    }
}
