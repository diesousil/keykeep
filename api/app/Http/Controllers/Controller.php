<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\ItemNotFoundException;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Model;
use Throwable;

class Controller
{
    public static function success(
        mixed $data,
        int $statusCode = Response::HTTP_OK
    ): JsonResponse|ResourceCollection {
        if ($data == null) {
            throw new NotFoundHttpException('Record not found.');
        }

        if ($data instanceof ResourceCollection) {
            return $data;
        }

        return response()->json([
            'success' => true,
            'data'    => $data,
        ], $statusCode);
    }

    public static function error(string $message, int $statusCode = Response::HTTP_BAD_REQUEST): JsonResponse
    {
        return response()->json([
            'error' => $message,
        ], $statusCode);
    }
}
