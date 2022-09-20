<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bootcamp;

class BootcampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo"aqui se va a mostrar todos los bootcamp";
        return response()->json([   
                                    "success"=> true ,
                                    "datos" =>  Bootcamp::all()
                                ] , 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //registrar el bootcamp a partir de payload 
      $b = Bootcamp::create([
        "name" => $request->name,
        "description" => $request->description,
        "webside" => $request->webside,
        "phone" => $request->phone,
        "user_id" =>$request->user_id
    ]);
    return response()->json([   
        "success"=> true ,
        "datos" =>  $b
    ] , 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //echo"mostrarun bootcamp cuyo id es: $id";
        return response()->json([   
                                "success"=> true ,
                                "datos" =>  Bootcamp::find($id)
                            ] , 200);
    }

    /**
     * Update the specified resource in storage.    
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //1. seleccionar el bootcamp por id
        $bootcamp = Bootcamp::find($id);
        //2.Actualizarlo 
        $bootcamp->update(
            $request->all()
        );
        //3. Hacer el response respectivo
        return response()->json([   
            "success"=> true ,
            "datos" =>  $bootcamp
        ] , 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //1. seleccionas el bootcamp
        $bootcamp = Bootcamp::find($id);
        //2. eliminar ese bootcamp
        $bootcamp ->delete();
        //response:
        return response()->json([   
            "success"=> true ,
            "message" => "Bootcamp eliminado",
            "datos" =>  $bootcamp->id
        ] , 200);
    }
}
