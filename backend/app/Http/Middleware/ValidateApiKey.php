<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateApiKey
{
    /**
     * Handle the incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Retrieve API key from request header
        $apiKey = $request->header('API-Key');

        // Retrieve configured API key using config()
        $configuredApiKey = config('app.api_key');

        $locale = config('app.locale');

        // Validate the API key
        if (empty($apiKey)) {
            return response()->json([
                'error' => 'Missing API Key',
                'message' => 'The API-Key header is required.',
            ], Response::HTTP_BAD_REQUEST);
        }

        if (! hash_equals($configuredApiKey, $apiKey)) {
            return response()->json([
                'error' => 'Invalid API Key',
                'message' => 'The provided API key is incorrect. Check your credentials.',
            ], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
