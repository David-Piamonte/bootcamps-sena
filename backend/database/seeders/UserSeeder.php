<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use File;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1.Leer el archivo de datos 
        $json=file::get('database/_data/user.json');
        //2.convertir los datos del jason en un areglo
        $arreglo_usuarios = json_decode($json);
        //3.recorrer el areglo 
        //var_dump($arreglo_usuarios);
        foreach($arreglo_usuarios as $usuario){
        //4.Registrar el usuario en base de datos
        //se utiliza el metodo ::create
        User::create([
            "name" => $usuario->name,
            "email" => $usuario->email,
            "password" => Hash::make ($usuario->password)
        ]);
        }

    }
}
