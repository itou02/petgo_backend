<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $x = Validator::make($request->all(),[
            'name' => ['required','string','max:255'],
            'sex' => ['required','string','max:255'],
            'phone' => ['required','string','max:255'],
            'email' => ['required','string','email','max:255','unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($x->fails())
        {
            $messages = $x->messages();
            return $messages;
        }
        
        $location = $request->location_a . $request->location_b;

        $comment = DB::select('SELECT *
        FROM locations
        WHERE location = ?', [$location]);
        $location_id = $comment[0]->id;

        $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString();

        $user = User::create([
            'id' => $uuid,
            'name' => $request->name,
            'sex' => $request->sex,
            'phone' => $request->phone,
            'birth' => $request->date,
            'email' => $request->email,
            'location_id' => $location_id,
            'password' => Hash::make($request->password),
        ]);

        // event(new Registered($user));

        // Auth::login($user);

        return response()->json([
            'status' => '成功',
        ]);

        // return redirect(RouteServiceProvider::HOME);
    }
}
