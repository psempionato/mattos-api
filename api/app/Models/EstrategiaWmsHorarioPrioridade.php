<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstrategiaWmsHorarioPrioridade extends Model
{
    use HasFactory;

    protected $table = 'tb_estrategia_wms_horario_prioridade';

    protected $primaryKey = 'cd_estrategia_wms_horario_prioridade';

    public $incrementing = true;

    protected $keyType = 'int';

    public $timestamps = false;

    protected $fillable = [
        'cd_estrategia_wms',
        'ds_horario_inicio',
        'ds_horario_final',
        'nr_prioridade',
        'dt_registro',
        'dt_modificado',
    ];

    public function estrategiaWms()
    {
        return $this->belongsTo(EstrategiaWms::class, 'cd_estrategia_wms', 'cd_estrategia_wms');
    }
}
