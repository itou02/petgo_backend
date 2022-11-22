<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // 認證通過...
            $request->session()->regenerate();
            do {
                $token = Str::random(15);
                $tokenCheck = User::where('remember_token', $token)->first();
                if (isset($tokenCheck)) {
                    $sameToken = true;
                } else {
                    $sameToken = false;
                }
            } while ($sameToken);

            DB::table('users')->where('email', $request->email)->update(['remember_token' => $token, 'updated_at' => Carbon::now()]);

            return response()->json([
                'status' => true,
                'userToken' => $token,
                'user' => DB::table('users')->where('email', $request->email)->get(),
                'csrftoken' => csrf_token(),
            ], 200);
        } else {
            return response()->json([
                'status' => 'false',
            ]);
        }

        // $request->authenticate();

        // $request->session()->regenerate();

        // return response()->json([
        //     'status' => '登錄成功',
        //     'auth' => Auth::user(),
        //     'csrf_token' => csrf_token(),
        // ]);

        // return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $id = $request['userData']->id;
        DB::table('users')->where('id', $id)->update(['remember_token' => '', 'updated_at' => Carbon::now()]);

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json([
            'status' => '登出成功'
        ]);

        //return redirect('/');
    }
}