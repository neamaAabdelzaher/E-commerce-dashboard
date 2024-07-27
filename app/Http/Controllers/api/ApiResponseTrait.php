<?php
namespace App\Http\Controllers\api;

trait ApiResponseTrait{


    public function apiRes($data=null,$message=null,$ststus=null){
        $array=[
            'data'=>$data,
            'messsage'=>$message,
            'status'=>$ststus
        ];
         return response($array);

    }
}
























?>