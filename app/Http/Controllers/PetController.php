<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PetRequest;
use App;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return App\Pet::with('attendances')->paginate(10);
    }

    // public function filter(Request $request){
    //     return App\Pet::with('attendances')->paginate(1);
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PetRequest $request)
    {

        //
        \DB::beginTransaction();
        try {
            $pet = App\Pet::create($request->all());
            \DB::commit();

            return response()->json($pet, 201);

        } catch (\Exception $e) {
            \DB::rollback();
            return response()->json(null, 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $pet = App\Pet::with('attendances')->find($id);
        if($pet !== null){
            return response()->json($pet, 200);
        }
        return response()->json(null, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PetRequest $request, $id)
    {
        //
        
        try {
          
            $pet = App\Pet::find($id);
            if($pet !== null){
                $pet->fill($request->all())->save();
                \DB::commit();

                return response()->json($pet, 200);
            }
            
            return response()->json($pet, 404);
        } catch (\Exception $e) {
            \DB::rollback();
            return response()->json(null, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pet = App\Pet::find($id);
        if($pet !== null){
            $pet->delete();
            response()->json(null, 204);
        }
        response()->json(null, 404);
    }
}
