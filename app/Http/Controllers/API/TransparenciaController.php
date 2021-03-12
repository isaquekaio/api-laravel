<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransparenciaController extends Controller
{
    
    public function listar ()
    {
        $doencas = DB::table('doencas')->select('id','nome')->get();
        $sexos = DB::table('sexos')->select('id','nome')->get();
        $faixa = array([
            1 => "00-18", 
            2 => "19-25",
            3 => "26-35", 
            4 => "36-50", 
            5 => "51-60", 
            6 => "60-70", 
            7 => "70-80", 
            8 => "80-100"
        ]);
        return response([
            'doencas' => $doencas,
            'sexos' => $sexos,
            'faixa' => $faixa
        ], 200);
    }

    public function filtro (Request $request)
    {
        $doenca = $request->get('doenca_id');
        $uf = $request->get('uf_id');
        $municipio = $request->get('municipio_id');
        $sexo = $request->get('sexo_id');
        $faixa = $request->get('faixa');
        //intval($faixa);

        $pacientes_qtd = DB::table('pacientes')
            ->when($doenca != null, function ($query){
                return $query
                    ->crossJoin('doencas_tem_pacientes')
                    ->orderByDesc('doenca_id');
            })->when($uf != null, function ($query) use ($uf){
                return $query->where('uf_id', $uf)->orderByDesc('uf_id');
            })->when($municipio != null, function ($query) use ($municipio){
                return $query->where('municipio_id', $municipio)->orderByDesc('municipio_id');
            })->when($sexo != null, function ($query) use ($sexo){
                return $query->where('sexo_id', $sexo)->orderByDesc('sexo_id');
            })->when($faixa != null, function ($query) use ($faixa){
                $hoje = date("Y");
                
                $ano_nascimento = $query->pluck('data_nascimento')->map(function ($data) {
                    return $data->format('Y'); 
                });

                for ($i = 0; $i < $ano_nascimento->count(); $i++){

                    $idade = $hoje - $ano_nascimento[$i];
                    if ($faixa == 1 && ($idade >= 0 && $idade <= 18))
                    {
                        return $query->orderByDesc('data_nascimento');
                        break;
                    }else if ($faixa == 2 && ($idade >= 19 && $idade <= 25))
                    {
                        return $query->orderByDesc('data_nascimento');
                        break;
                    }else if ($faixa == 3 && ($idade >= 26 && $idade <= 35))
                    {
                        return $query->orderByDesc('data_nascimento');
                        break;
                    }else if ($faixa == 4 && ($idade >= 36 && $idade <= 50))
                    {
                        return $query->orderByDesc('data_nascimento');
                        break;
                    }else if ($faixa == 5 && ($idade >= 51 && $idade <= 60))
                    {
                        return $query->orderByDesc('data_nascimento');
                        break;
                    }else if ($faixa == 6 && ($idade >= 60 && $idade <= 70))
                    {
                        return $query->orderByDesc('data_nascimento');
                        break;
                    }else if ($faixa == 7 && ($idade >= 70 && $idade <= 80))
                    {
                        return $query->orderByDesc('data_nascimento');
                        break;
                    }else if ($faixa == 8 && ($idade >= 80 && $idade <= 100))
                    {
                        return $query->orderByDesc('data_nascimento');
                        break;
                    }
                }
            })->count();
    
        
        return response([
            'pacientes_qtd' => $pacientes_qtd
        ], 200);
    }
}
