<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('permission_denied');
            // exit(json_encode(['status' => '權限不足 請先登錄'], JSON_UNESCAPED_UNICODE));
            // return route('login');
        }
    }
}
