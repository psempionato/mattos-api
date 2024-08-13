<?php

namespace App\Http\Controllers;

use App\DTOs\StoreEstrategiaWmsParams;
use App\Http\Requests\StoreEstrategiaRequest;
use App\Services\EstrategiaWmsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EstrategiaWmsController extends Controller
{
    public function __construct(
        protected EstrategiaWmsService $estrategiaWmsService
    ){}

    /**
     * Cria um novo registro no banco de dados
     *
     * @param StoreEstrategiaRequest $request
     * @return JsonResponse
     */
    public function store(StoreEstrategiaRequest $request):JsonResponse
    {
        $params = $this->setStoreParams($request);
        $response = $this->estrategiaWmsService->create($params);
        
        return $response;
    }

    /**
     * Atribui os valores ao DTO
     *
     * @param Request $request
     * @return StoreEstrategiaWmsParams
     */
    public function setStoreParams(Request $request): StoreEstrategiaWmsParams
    {
        return new StoreEstrategiaWmsParams(
            $request->dsEstrategia,
            $request->nrPrioridade,
            $request->horarios
        );
    }


    /**
     * Busca a prioridade com base na hora e minuto informados
     *
     * @param integer $cdEstrategia
     * @param string $dsHora
     * @param string $dsMinuto
     * @return void
     */
    public function getPrioridade(int $cdEstrategia, string $dsHora, string $dsMinuto)
    {
        $response = $this->estrategiaWmsService->getPrioridade($cdEstrategia, $dsHora, $dsMinuto);
        return $response;
    }
}
