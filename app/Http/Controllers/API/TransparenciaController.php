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
        $campos_group_by = $request->get('group_by');
        $campos_order_by = $request->get('order_by');

        $group_by = is_null($campos_group_by) ? null : implode("','",$campos_group_by);
        $order_by = is_null($campos_order_by) ? null : implode("','", $campos_order_by);
        //intval($faixa);

        $pacientes_qtd = DB::table('pacientes')
            ->when($doenca != null, function ($query) use ($doenca){
                return $query
                    ->join('doencas_tem_pacientes', 'pacientes.id', '=', 'doencas_tem_pacientes.paciente_id')
                    ->where('doencas_tem_pacientes.doenca_id', '=', $doenca);
            })->when($uf != null, function ($query) use ($uf){
                return $query->where('uf_id', $uf);
            })->when($municipio != null, function ($query) use ($municipio){
                return $query->where('municipio_id', $municipio);
            })->when($sexo != null, function ($query) use ($sexo){
                return $query->where('sexo_id', $sexo);
            })->when($faixa != null, function ($query) use ($faixa){
                $hoje = date("Y");

                $ano_nascimento = $query->pluck('data_nascimento')->map(function ($data) {
                    return $data->format('Y');
                });
                //dd(intval($hoje) - intval($ano_nascimento[1]));
                //dd(date('Y',strtotime($ano_nascimento[0])));
                //dd(intval($hoje) - intval(date('Y',strtotime($ano_nascimento[0]))));
                for ($i = 0; $i < $ano_nascimento->count(); $i++){

                    $idade = intval($hoje) - intval(date('Y',strtotime($ano_nascimento[$i])));

                    if ($faixa == 1 && ($idade >= 0 && $idade <= 18))
                    {
                        return $query;
                        break;
                    }else if ($faixa == 2 && ($idade >= 19 && $idade <= 25))
                    {
                        return $query;
                        break;
                    }else if ($faixa == 3 && ($idade >= 26 && $idade <= 35))
                    {
                        return $query;
                        break;
                    }else if ($faixa == 4 && ($idade >= 36 && $idade <= 50))
                    {
                        return $query;
                        break;
                    }else if ($faixa == 5 && ($idade >= 51 && $idade <= 60))
                    {
                        return $query;
                        break;
                    }else if ($faixa == 6 && ($idade >= 60 && $idade <= 70))
                    {
                        return $query;
                        break;
                    }else if ($faixa == 7 && ($idade >= 70 && $idade <= 80))
                    {
                        return $query;
                        break;
                    }else if ($faixa == 8 && ($idade >= 80 && $idade <= 100))
                    {
                        return $query;
                        break;
                    }
                }
            })->when($group_by != null, function ($query) use ($group_by){
                return $query->groupBy($group_by);
            })->when($order_by != null, function ($query) use ($order_by){
                return $query->orderBy($order_by);
            })->count();

        return response([
            'pacientes_qtd' => $pacientes_qtd
        ], 200);
    }
}
