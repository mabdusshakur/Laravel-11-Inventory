<?php

namespace App\Http\Controllers;

abstract class Controller
{

    /**
     * Summary of sendSuccess
     * @param mixed $message - success message
     * @param mixed $result - data to be returned in the response
     * @param mixed $statusCode - status code, default is 200
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function sendSuccess($message, $result, $statusCode = 200)
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];
        return response()->json($response, $statusCode);
    }


    /**
     * Summary of sendError
     * @param mixed $message - error message
     * @param mixed $statusCode - error status code, default is 400
     * @param mixed $errors - error data array
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function sendError($message, $statusCode = 400, $errors = [])
    {
        $response = [
            'success' => false,
            'message' => $message,
            'errors' => $errors,
        ];

        return response()->json($response, $statusCode);
    }
}