<?php

namespace App\Http\Controllers;

use App\Http\Resources\HousesResource;
use App\Models\House;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function accept($id,Request $request)
    {
       return House::find($id)->update($request->all());
    }
}
