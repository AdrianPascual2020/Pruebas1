<?php

namespace App\Services\Services;

use App\Exceptions\CustomException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class CustomService
{
    const STATUS    = 'status';
    const MESSAGE   = 'message';
    const CODE      = 'code';

    public function responseOK(string $message, array $extraFields = null): array
    {
        $response = [
            self::STATUS    => true,
            self::MESSAGE   => $message,
            self::CODE      => Response::HTTP_OK
        ];

        if ($extraFields) {
            foreach ($extraFields as $key => $item) {
                $response[$key] = $item;
            }
        }
        return $response;
    }

    public function responseKO(Throwable $exception, string $message): array
    {
        $response = [
            self::STATUS    => false,
            self::MESSAGE   => $message,
            self::CODE      => $exception->getCode()
        ];

        Log::error($exception);

        if ($exception instanceof CustomException) {
            $response[self::MESSAGE]    = $exception->getMessage();
        }

        if ($exception instanceof QueryException) {
            DB::rollBack();
        }

        return $response;
    }
}
