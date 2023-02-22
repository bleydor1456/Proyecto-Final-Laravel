<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empleado
 *
 * @property $id
 * @property $nombre
 * @property $apellidos
 * @property $edad
 * @property $curp
 * @property $RFC
 * @property $correo
 * @property $telefono
 * @property $direccion
 * @property $puesto_trabajo
 * @property $id_modulo
 * @property $created_at
 * @property $updated_at
 *
 * @property Modulo $modulo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empleado extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'apellidos' => 'required',
		'curp' => 'required',
		'RFC' => 'required',
		'telefono' => 'required',
		'direccion' => 'required',
		'puesto_trabajo' => 'required',
		'id_modulo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','apellidos','nac','curp','RFC','correo','telefono','direccion','puesto_trabajo','id_modulo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function modulo()
    {
        return $this->hasOne('App\Models\Modulo', 'id', 'id_modulo');
    }
    

}
