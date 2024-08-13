<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstrategiaWms extends Model
{
    use HasFactory;

    protected $table = 'tb_estrategia_wms';

    protected $primaryKey = 'cd_estrategia_wms';

    public $incrementing = true;
 
    protected $keyType = 'int';
 
    public $timestamps = false;

    protected $fillable = [
        'ds_estrategia_wms',
        'nr_prioridade',
        'dt_registro',
        'dt_modificado',
    ];

    public function horariosPrioridade()
    {
        return $this->hasMany(EstrategiaWmsHorarioPrioridade::class, 'cd_estrategia_wms', 'cd_estrategia_wms');
    }
}
