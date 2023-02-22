<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Modulo;
use App\Models\Empleado;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        //modulos
        Modulo::firstOrCreate([
            'nombre_modulo' => 'Modulo IMOS',
            'direccion' => 'Carretera Tijuana-tecate / blvrd 2000',
            'telefono' => '664652980',
            'estado' => 'En labores',
            'capacidad' => 340
        ]);
        Modulo::firstOrCreate([
            'nombre_modulo' => 'Modulo Otay',
            'direccion' => 'Otay Zona Industrial',
            'telefono' => '664984123',
            'estado' => 'En labores / Parcialmente',
            'capacidad' => 550
        ]);
        Modulo::firstOrCreate([
            'nombre_modulo' => 'Modulo Via Rapida',
            'direccion' => 'Carretera Via Rapida',
            'telefono' => '6641231123',
            'estado' => 'Abierto por cita',
            'capacidad' => 40
        ]);
        Modulo::firstOrCreate([
            'nombre_modulo' => 'Modulo Zona Centro',
            'direccion' => 'Tijuana Centro',
            'telefono' => '664765234',
            'estado' => 'Abierto',
            'capacidad' => 560
        ]);

        //empleados
        Empleado::firstOrCreate([
            'nombre' => 'Joshua',
            'apellidos' => 'Flores',
            'nac' => '2002/12/03',
            'curp' => 'floresAKXXXX',
            'RFC' => 'joshua20LMG',
            'correo' => '@joshua',
            'telefono' => '123123987',
            'direccion' => 'Murua',
            'puesto_trabajo' => 'Sin Puesto definido',
            'id_modulo' => '2'
        ]);

        Empleado::firstOrCreate([
            'nombre' => 'Edgar',
            'apellidos' => 'Galvan',
            'nac' => '2000/04/09',
            'curp' => 'EdgarAKXXXX',
            'RFC' => 'Edgar23LMG',
            'correo' => '@edgar',
            'telefono' => '664567123',
            'direccion' => 'Murua',
            'puesto_trabajo' => 'Administrador',
            'id_modulo' => '1'
        ]);

        
        Empleado::firstOrCreate([
            'nombre' => 'Ivan',
            'apellidos' => 'Licona',
            'nac' => '1995/10/05',
            'curp' => 'IvanAKXXXX',
            'RFC' => 'Ivan33LMG',
            'correo' => '@ivan',
            'telefono' => '664',
            'direccion' => 'Murua',
            'puesto_trabajo' => 'Administrador',
            'id_modulo' => '3'
        ]);

        Empleado::firstOrCreate([
            'nombre' => 'Frida',
            'apellidos' => 'Garrido',
            'nac' => '2001/01/01',
            'curp' => 'FridaAKXXXX',
            'RFC' => 'Frida25LMG',
            'correo' => '@frida',
            'telefono' => '1111',
            'direccion' => 'Tecate',
            'puesto_trabajo' => 'Recepcion',
            'id_modulo' => '4'
        ]);

    }
}