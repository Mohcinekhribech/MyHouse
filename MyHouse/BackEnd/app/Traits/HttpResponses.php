<?php
namespace App\Traits;

trait HttpResponses{
    protected function succes($data,$message = null ,$code = 200)
    {
        return response()->json([
            'status' => 'Request was seccesful',
            'message' => $message,
            'data' => $data
        ],$code);
    }
    protected function error($data,$message = null ,$code)
    {
        return response()->json([
            'status' => 'Error has accured ...',
            'message' => $message,
            'data' => $data
        ],$code);
    }
}