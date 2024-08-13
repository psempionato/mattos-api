<?php
 
namespace App\Services;

use App\DTOs\StoreEstrategiaWmsParams;
use App\Repositories\Contracts\EstrategiaWmsHorarioPrioridadeRepositoryInterface;
use App\Repositories\Contracts\EstrategiaWmsRepositoryInterface;
use Illuminate\Http\JsonResponse;

class EstrategiaWmsService
{
    public function __construct(
        protected EstrategiaWmsRepositoryInterface $estrategiaWmsRepository,
        protected EstrategiaWmsHorarioPrioridadeRepositoryInterface $estrategiaWmsHorarioPrioridadeRepository
    ){}

    /**
     * Cria um novo registro no banco de dados
     *
     * @param StoreEstrategiaWmsParams $params
     * @return JsonResponse
     */
    public function create(StoreEstrategiaWmsParams $params): JsonResponse
    {
        try {
            $response = $this->estrategiaWmsRepository->create($params);

            return response()->json(['data' => $response], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    /**
     * Busca a prioridade com base na hora e minuto informados
     *
     * @param integer $cdEstrategia
     * @param string $dsHora
     * @param string $dsMinuto
     * @return JsonResponse
     */
    public function getPrioridade(int $cdEstrategia, string $dsHora, string $dsMinuto): JsonResponse
    {
        try {
            $estrategia = $this->estrategiaWmsRepository->findById($cdEstrategia);
        
            if(!$estrategia){
                return response()->json(['message' => 'Registro não encontrado'], 404);
            }

            $hora = $dsHora.':'.$dsMinuto;

            $hora_prioridade = $this->estrategiaWmsHorarioPrioridadeRepository->findByHora($cdEstrategia, $hora);

            if(!$hora_prioridade){
                return response()->json(['data' => $estrategia], 200);
            }

            return response()->json(['data' => $hora_prioridade], 200);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
        
    }
}