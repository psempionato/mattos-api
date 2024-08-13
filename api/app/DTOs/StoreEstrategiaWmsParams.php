<?php

namespace App\DTOs;

class StoreEstrategiaWmsParams
{
    public $dsEstrategia;
    public $nrPrioridade;
    public $horarios;

    public function __construct(
        string $dsEstrategia,
        int $nrPrioridade,
        array $horarios
    )
    {
        $this->dsEstrategia = $dsEstrategia;
        $this->nrPrioridade = $nrPrioridade;
        $this->horarios = $horarios;
    }
}