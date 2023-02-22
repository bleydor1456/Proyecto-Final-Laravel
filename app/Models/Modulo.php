<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Modulo
 *
 * @property $id
 * @property $nombre_modulo
 * @property $direccion
 * @property $telefono
 * @property $estado
 * @property $capacidad
 * @property $created_at
 * @property $updated_at
 *
 * @property Cita[] $citas
 * @property Empleado[] $empleados
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Modulo extends Model
{
    
    static $rules = [
		'nombre_modulo' => 'required',
		'direccion' => 'required',
		'telefono' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_modulo','direccion','telefono','estado','capacidad'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function citas()
    {
        return $this->hasMany('App\Models\Cita', 'id_modulo_cita', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empleados()
    {
        return $this->hasMany('App\Models\Empleado', 'id_modulo', 'id');
    }
    

}
