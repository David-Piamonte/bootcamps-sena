<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewsController extends Controller
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
            "datos" =>  Review::all()
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
        $review = new Review();
        $review->title = $request->title;
        $review->text = $request->text;
        $review->rating = $request->rating;
        $review->user_id = $id;
        $review->bootcamp_id = $id;
        $review->save();
        //enviar response
        return response()->json([
            "success" => true,
            "data" => $review
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
            "datos" =>  Review::find($id)
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
        $Review = Review::find($id);
        $Review->update(
            $request->all()
        );
        return response()->json([   
            "success"=> true ,
            "datos" =>  $Review
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
        $Review = Review::find($id);
        $Review->delete(
        );
        return response()->json([   
            "success"=> true ,
            "message" => "Review eliminado",
            "datos" =>  $Review->id,
        ] , 200);
    }
}
