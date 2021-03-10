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
        $pacientes = Paciente::with('doencas')->get();
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
            'uf_id' => 'exists:ufs,id',
            'municipio_id' => 'exists:municipios,id',
            'sexo_id' => 'exists:sexos,id',
        ]);

        Paciente::create($data);

        return response([
            'message' => 'Paciente cadastrado com sucesso!'], 201
        );
    }

    public function associar_doenca(Request $request, $id)
    {
        $data = $request->validate([
            'doencas' => ['exists:doencas,id'],
        ]);

        $paciente = Paciente::find($id);

        if ($data && count($data['doencas']) != 0 && $paciente == true)
        {
            $paciente->doencas()->syncWithoutDetaching($data['doencas']);
            $message = 'Doenças associada ao paciente';
            $status = 200;
        }
        else {
            $message = 'Falha ao associar doença(s)!';
            $status = 412;
        }

        return response([
            'message' => $message
        ], $status);
    }

    public function desassociar_doenca(Request $request, $id)
    {
        $data = $request->validate([
            'doencas' => ['exists:doencas,id'],
        ]);

        $paciente = Paciente::find($id);

        if ($data && count($data['doencas']) != 0 && $paciente == true)
        {
            $paciente->doencas()->detach($data['doencas']);
            $message = 'Doenças desassociada do paciente.';
            $status = 200;
        }
        else {
            $message = 'Falha ao desassociada  doença(s).';
            $status = 412;
        }

        return response([
            'message' => $message
        ], $status);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        $p = Paciente::with('doencas')->find($paciente->id);
        return response([
            'paciente' => $p
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
            'uf_id' => 'exists:ufs,id',
            'municipio_id' => 'exists:municipios,id',

        ]);

        $paciente->update($data);
        
        return response([
            'message' => 'Paciente atualizado com sucesso!'], 200
        ); 
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
