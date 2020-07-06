<?php

namespace App\Services;

trait StatusResponse
{
    public function responseStatus($code, $message, $data = null)
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    public function responseException($code, $e)
    {
        return response()->json([
            'code' => $code,
            'message' => $e->getMessage()
        ]);
    }
}
