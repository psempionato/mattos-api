<?php 

namespace App\Repositories\Contracts;

use App\DTOs\StoreEstrategiaWmsParams;
use Illuminate\Database\Eloquent\Collection;

interface EstrategiaWmsRepositoryInterface
{
    /**
     * Cria um novo registro no banco de dados
     *
     * @param StoreEstrategiaWmsParams $params
     * @return Object
     */
    public function create(StoreEstrategiaWmsParams $params): Object;

    public function findById(int $cdEstrategia): ?Object;
}