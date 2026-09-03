<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\ItemNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Controller
{
    public static function success(bool|object|array $data, int $statusCode = Response::HTTP_OK): JsonResponse|ResourceCollection
    {

        if ($data instanceof ResourceCollection) {
            return $data;
        }

        return response()->json([
            'data' => $data,
        ], $statusCode);
    }

    public static function error(string $message, int $statusCode = Response::HTTP_BAD_REQUEST): JsonResponse
    {
        return response()->json([
            'error' => $message,
        ], $statusCode);
    }
}
