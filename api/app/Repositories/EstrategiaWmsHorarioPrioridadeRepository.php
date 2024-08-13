<?php

namespace App\Repositories;

use App\Models\EstrategiaWmsHorarioPrioridade;
use App\Repositories\Contracts\EstrategiaWmsHorarioPrioridadeRepositoryInterface;

class EstrategiaWmsHorarioPrioridadeRepository implements EstrategiaWmsHorarioPrioridadeRepositoryInterface
{

    public function findByHora(int $cdEstrategia, string $hora): ?object
    {
        return EstrategiaWmsHorarioPrioridade::query()
            ->where('cd_estrategia_wms', $cdEstrategia)
            ->whereTime('ds_horario_inicio', '<=', $hora)
            ->whereTime('ds_horario_final', '>=', $hora)
            ->first();
    }
}