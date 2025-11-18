<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

class AppBaseController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Helper untuk respon sukses JSON.
     */
    public function sendResponse($result, $message)
    {
        return response()->json([
            'success' => true,
            'data' => $result,
            'message' => $message,
        ], 200);
    }

    /**
     * Helper untuk respon error JSON.
     */
    public function sendError($error, $code = 404)
    {
        return response()->json([
            'success' => false,
            'message' => $error,
        ], $code);
    }

    /**
     * Helper untuk pesan sukses umum.
     */
    public function sendSuccess($message)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
        ], 200);
    }
}
