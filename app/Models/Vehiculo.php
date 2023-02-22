<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Auto
 *
 * @property $id
 * @property $VIN
 * @property $marca
 * @property $modelo
 * @property $año
 * @property $cilindros
 * @property $tipo
 * @property $cant_puertas
 * @property $estado
 * @property $id_dueño
 * @property $created_at
 * @property $updated_at
 *
 * @property Cita $cita
 * @property Usuarios $usuarios
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Vehiculo extends Model
{
    
    static $rules = [
		'VIN' => 'required',
		'marca' => 'required',
		'modelo' => 'required',
		'año' => 'required',
		'cilindros' => 'required',
		'tipo' => 'required',
		'cant_puertas' => 'required',
		'estado' => 'required',
		'id_dueño' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['VIN','marca','modelo','año','cilindros','tipo','cant_puertas','estado','id_dueño'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cita()
    {
        return $this->hasOne('App\Models\Cita', 'id_vehiculo_citado', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function usuarios()
    {
        return $this->hasOne('App\Models\Usuarios', 'id', 'id_dueño');
    }
    

}
