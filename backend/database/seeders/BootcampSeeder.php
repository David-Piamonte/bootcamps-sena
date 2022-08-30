<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bootcamp;
use File;

class BootcampSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1.Leer el archivo de datos 
        $json=file::get('database/_data/bootcamps.json');
        $arreglo_bootcamps = json_decode($json);
        foreach($arreglo_bootcamps as $bootcamps){
        Bootcamp::create([
            "name" => $bootcamps->name,
            "description" => $bootcamps->description,
            "webside" => $bootcamps->webside,
            "phone" => $bootcamps->phone,
            "user_id" =>$bootcamps->user_id
        ]);
        }
    }
}
