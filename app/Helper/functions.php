<?php

function apiResponse($data= null,$message = null,$status = null,$statusCode = 200){
    $array = [
        'status'=>$status,
        'statusCode'=>$statusCode,
        'message'=>$message,
        'items'=>$data,
    ];

    return response()->json($array);

}
