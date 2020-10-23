<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendResponse($result=[],$message=[],$otherData=[]){

		$code = 200;
    	$response = [
			'status'  => 'success',
    		'status_code' => $code
    	];
    		if(!empty($message)){
				$response['message'] = $message;
			}

    		if(!empty($result)){
				$response['data'] = $result;
			}
			if(!empty($otherData)){
				$response['other_data'] = $otherData;
			}

    	return response()->json($response,$code);
	}

    /** Send Error Responce **/
	public function sendError($errorMessages=[],$error){
		$code = 400;
		$http_code = 201;
		$response = [
			 'status'=> 'error',
			 'message'=>$error,
			 'status_code' => $code,
			];

			if(!empty($errorMessages)){
				$response['data'] = $errorMessages;
			}

		return response()->json($response,$code);	
	}
}
