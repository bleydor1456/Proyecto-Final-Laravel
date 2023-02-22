<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cita
 *
 * @property $id
 * @property $fecha_registro
 * @property $fecha_cita
 * @property $id_usuario_cita
 * @property $id_vehiculo_citado
 * @property $id_modulo_cita
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Vehiculo $vehiculo
 * @property Modulo $modulo
 * @property Usuarios $usuarios
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cita extends Model
{
    
    static $rules = [
		'fecha_registro' => 'required',
		'fecha_cita' => 'required',
		'id_usuario_cita' => 'required',
		'id_vehiculo_citado' => 'required',
		'id_modulo_cita' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha_registro','fecha_cita','id_usuario_cita','id_vehiculo_citado','id_modulo_cita','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vehiculo()
    {
        return $this->hasOne('App\Models\Vehiculos', 'id', 'id_vehiculo_citado');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function modulo()
    {
        return $this->hasOne('App\Models\Modulo', 'id', 'id_modulo_cita');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function usuarios()
    {
        return $this->hasOne('App\Models\Usuarios', 'id', 'id_usuarios_cita');
    }
    

}
