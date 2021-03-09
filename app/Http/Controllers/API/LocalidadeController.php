<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Municipio;
use App\Models\Uf;

class LocalidadeController extends Controller
{
    public function index($id=null)
    {
         if ($id != null && Uf::find($id))
        {
            return response([
                'municipios' => Uf::find($id)->with('municipios')->get() 
            ], 200);
        }else{
            return response([
                'ufs' => Uf::select('id', 'nome', 'sigla')->orderBy('nome')->get()
            ], 200);
        }
    }
    

    public function store_uf(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|max:100|min:2',
            'sigla' => 'required|max:2|min:2',
        ]);

        Uf::create($data);
        return response([
            'message' => 'Uf cadastrado com sucesso!'], 201
        );
    }

    public function update_uf(Request $request, Uf $uf)
    {
        $data = $request->validate([
            'nome' => 'required|max:100|min:2',
            'sigla' => 'required|max:2|min:2',
        ]);

        $uf->update($data);
        
        return response([
            'message' => 'Uf atualizada com sucesso!'
        ], 200);
    }

    public function store_municipio(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|max:300|min:2',
            'uf_id' => 'exists:ufs,id',
        ]);

        Municipio::create($data);
        return response([
            'message' => 'Municipio cadastrado com sucesso!'], 201
        );
    }

    public function update_municipio(Request $request, Municipio $municipio)
    {
        $data = $request->validate([
            'nome' => 'required|max:300|min:2',
            'uf_id' => 'exists:ufs,id',
        ]);

        $municipio->update($data);
        
        return response([
            'message' => 'Municipio atualizada com sucesso!'
        ], 200);
    }
}
