<?php

namespace App\Repositories;

use App\DTOs\StoreEstrategiaWmsParams;
use App\Models\EstrategiaWms;
use App\Models\EstrategiaWmsHorarioPrioridade;
use App\Repositories\Contracts\EstrategiaWmsRepositoryInterface;

class EstrategiaWmsRepository implements EstrategiaWmsRepositoryInterface
{

    public function create(StoreEstrategiaWmsParams $params): Object
    {
        $estrategia = EstrategiaWms::create([
            'ds_estrategia_wms' => $params->dsEstrategia,
            'nr_prioridade' => $params->nrPrioridade,
            'dt_registro' => now(),
            'dt_modificado' => now(),
        ]);

        foreach($params->horarios as $horario){
            EstrategiaWmsHorarioPrioridade::create([
                'cd_estrategia_wms' => $estrategia->cd_estrategia_wms,
                'ds_horario_inicio' => $horario['dsHorarioInicio'],
                'ds_horario_final' => $horario['dsHorarioFinal'],
                'nr_prioridade' => $horario['nrPrioridade'],
                'dt_registro' => now(),
                'dt_modificado' => now(),
            ]);
        }
        
        return $estrategia;
    }

    /**
     * Busca a estratégia pelo id
     *
     * @param integer $cdEstrategia
     * @return object|null
     */
    public function findById(int $cdEstrategia): ?object
    {
        return EstrategiaWms::query()->where('cd_estrategia_wms', $cdEstrategia)->first();
    }
}