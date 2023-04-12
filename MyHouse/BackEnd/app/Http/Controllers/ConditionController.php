<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use Illuminate\Http\Request;
use App\Http\Requests\StoreConditionRequest;
use App\Http\Requests\UpdateConditionRequest;

class ConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreConditionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $conditions = $request->condition;
        $house_id = $request->house_id;
        if($conditions){
            foreach($conditions as $condition){
            Condition::create(['condition'=>$condition,'house_id'=>$house_id]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Condition  $condition
     * @return \Illuminate\Http\Response
     */
    public function show(Condition $condition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateConditionRequest  $request
     * @param  \App\Models\Condition  $condition
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConditionRequest $request, Condition $condition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Condition  $condition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Condition $condition)
    {
        //
    }
}
