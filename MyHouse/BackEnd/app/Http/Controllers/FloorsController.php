<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Floor;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFloorRequest;
use App\Http\Requests\UpdateFloorRequest;

class FloorsController extends Controller
{
    public function index()
    {
        return Floor::all() ;
    }
    public function store(Request $request)
    {
        return Floor::create(['houses_id'=>$request->houses_id]);
    }
    public function show($id)
    {
        return Floor::find($id);
    }
    public function destroy($id)
    {   Room::where('floors_id',$id)->delete();
        return Floor::find($id)->delete();
    }
}
