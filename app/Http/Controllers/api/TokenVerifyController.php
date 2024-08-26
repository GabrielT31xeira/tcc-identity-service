<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TokenVerifyController extends Controller
{
    public function normalToken()
    {
        try {
            $user = Auth::user();

            if ($user) {
                return response()->json(['success' => 'Token is valid.'], 200);
            } else {
                return response()->json(['error' => 'Token is invalid or expired.'], 401);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error has occurred',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function adminToken()
    {
        try {
            $user = Auth::user();

            if ($user->is_admin != 0) {
                return response()->json(['success' => 'Token is valid.'], 200);
            } else {
                return response()->json(['error' => 'Token is invalid or expired.'], 401);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error has occurred',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
