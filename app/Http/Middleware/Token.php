<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class Token
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('userToken');
        $userData = User::where('remember_token', $token)->first();
        #將User資訊合併進去request，傳到後端
        $request->merge(['userData' => $userData]);
        if (isset($userData->remember_token)) {
            $tokenTime = $userData->updated_at->addDays(1);
            #判斷token是否過期
            if ($tokenTime < Carbon::now()) {
                return response()->json(['status' => false, 'error' => 'token out time'], 401);
            }
            return $next($request);
        } else {
            return response()->json(['status' => false, 'error' => 'token false'], 401);
        }
    }
}
