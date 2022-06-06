<?php
namespace App\Traits;

trait jsonResponse
{

    /**
     * Return API response with message, data and status code.
     *
     * @param $message
     * @param $data
     * @param $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function jsonResponse($message,$data, $code)
    {
        return response()->json([
            'status' => $message,
            'data'=>$data,
        ])->setStatusCode($code);
    }
}
