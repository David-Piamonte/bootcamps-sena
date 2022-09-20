<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([   
            "success"=> true ,
            "datos" =>  Course::all()
        ] , 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        /*var_dump($request->all());
        echo "<hr />";
        var_dump($id);*/
        //crear el curso
        $curso = new Course();
        $curso->title = $request->title;
        $curso->description = $request->description;
        $curso->weeks = $request->weeks;
        $curso->enroll_cost = $request->enroll_cost;
        $curso->minimun_skill = $request->minimun_skill;
        $curso->bootcamp_id = $id;
        $curso->save();
        //enviar response
        return response()->json([
            "success" => true,
            "data" => $curso
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
        return response()->json([   
            "success"=> true ,
            "datos" =>  Course::find($id)
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
        $Course = Course::find($id);
        $Course->update(
            $request->all()
        );
        return response()->json([   
            "success"=> true ,
            "datos" =>  $Course
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
        $Course = Course::find($id);
        $Course->delete(
        );
        return response()->json([   
            "success"=> true ,
            "message" => "Curso eliminado",
            "datos" =>  $Course->id,
        ] , 200);
    }
}
