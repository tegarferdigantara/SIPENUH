<?php

namespace App\Http\Middleware;

use App\Models\ChatbotApiKey;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChatbotMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $tokenValid = ChatbotApiKey::where('api_key', $request->header('Authorization'))->exists();

        if (!$tokenValid) {
            return response()->json('Unauthorized', 401);
        }

        return $next($request);
    }
}
