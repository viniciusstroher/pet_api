<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MedicalConsultationRequest;
use Illuminate\Support\Facades\DB;

use App;

class MedicalConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return App\MedicalConsultation::with('pet')->paginate(10);
    }

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
    public function store(MedicalConsultationRequest $request)
    {
        //
        \DB::beginTransaction();
        try {
            $mc = App\MedicalConsultation::create($request->all());
            \DB::commit();

            return response()->json($mc, 201);

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
        $mc = App\MedicalConsultation::with('pet')->find($id);
        if($mc !== null){
            return response()->json($mc, 200);
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
    public function update(MedicalConsultationRequest $request, $id)
    {
        //
        try {
          
            $mc = App\MedicalConsultation::find($id);
            if($mc !== null){
                $mc->fill($request->all())->save();
                \DB::commit();

                return response()->json($mc, 200);
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
        $mc = App\MedicalConsultation::find($id);
        if($mc !== null){
            $mc->delete();
            response()->json(null, 204);
        }
        response()->json(null, 404);

    }
}
