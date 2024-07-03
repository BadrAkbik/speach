<?php

namespace App\Classes;

use Illuminate\Http\Exceptions\HttpResponseException;

class ApiResponse
{
    public static function throw($message, $code)
    {
        throw new HttpResponseException(response()->json(["message" => $message], $code));
    }

    public static function sendResponse($result, $message, $code = 200)
    {
        $response = [
            'data' => $result
        ];
        if (!empty($message)) {
            $response['message'] = $message;
        }
        return response()->json($response, $code);
    }
}
