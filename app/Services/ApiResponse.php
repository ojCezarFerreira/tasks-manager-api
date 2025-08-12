<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    public static function success($data = [], $statusCode = 200): JsonResponse
    {
        return response()->json(
            $data,
            $statusCode,
        );
    }

    public static function error(string $message, $statusCode = 500): JsonResponse
    {
        return response()->json(
            [
                'message' => $message,
            ],
            $statusCode,
        );
    }
}
