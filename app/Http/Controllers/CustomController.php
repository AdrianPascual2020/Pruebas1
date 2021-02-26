<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CustomController extends Controller
{
    const PARAMS    = 'params';
    const CODE      = 'code';

    public function response(array $data = [], int $code = Response::HTTP_BAD_GATEWAY): JsonResponse
    {
        return response()->json($data, $code);
    }
}
