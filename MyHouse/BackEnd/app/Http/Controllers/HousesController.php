<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;
use App\Http\Requests\StoreHouseRequest;
use App\Http\Requests\UpdateHouseRequest;
use App\Http\Resources\HousesResource;

class HousesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->type){
            if($request->search)
                return HousesResource::collection(House::where('contractType',$request->type)->Where('Location', 'like', '%'.$request->search.'%')->get()) ;
                else 
                return HousesResource::collection(House::where('contractType',$request->type)->get()) ;
        }
        
        if($request->id){
            if($request->search)
            return HousesResource::collection(House::where('Owner_id',$request->id)->orWhere('Location', 'like', '%'.$request->search.'%')->get()) ;
            else 
            return HousesResource::collection(House::where('Owner_id',$request->id)->get()) ;
        }

        return HousesResource::collection(House::inRandomOrder()->orWhere('Location', 'like', '%'.$request->search.'%')->limit(6)->get())    ;
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHouseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHouseRequest $request)
    {
        return new HousesResource(House::create($request->all()));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new HousesResource(House::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHouseRequest  $request
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function update(StoreHouseRequest $request, $id)
    {
       return House::find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return House::destroy($id);
    }
}
