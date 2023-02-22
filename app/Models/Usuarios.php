<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

   /**
 * Class Usuario
 *
 * @property $id
 * @property $nombre
 * @property $Apellidos
 * @property $edad
 * @property $curp
 * @property $RFC
 * @property $correo
 * @property $telefono
 * @property $direccion
 * @property $created_at
 * @property $updated_at
 *
 * @property Vehiculo $vehiculo
 * @property Cita $cita
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Usuarios extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'apellidos' => 'required',
		'nac' => 'required',
		'curp' => 'required',
		'RFC' => 'required',
		'telefono' => 'required',
		'direccion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','apellidos','nac','curp','RFC','correo','telefono','direccion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vehiculo()
    {
        return $this->hasOne('App\Models\Vehiculo', 'id_dueño', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cita()
    {
        return $this->hasOne('App\Models\Cita', 'id_usuario_cita', 'id');
    }
    

}
