<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): Response
    {
       // $request->email = "admin@zicro.com";
        //$request->password = "password";

        
        $request->authenticate();

        $request->session()->regenerate();

        //return response()->noContent();
        $user = auth()->user();
        //$user = User::find(1);

        //dd($user);
        return response()->json($request);
        // return response()->json([
        //     'success' => true,
        //     'data' => [
        //         'token' => $user->createToken($user->name)->plainTextToken,
        //         'name' => $user->name
        //     ],
        //     'message' => 'User Logged !n :p'
        // ]);
    }

    public function stepin(Request $request)
    {
        
        
        // $request->authenticate();

        // $request->session()->regenerate();

        // //return response()->noContent();
        // $user = auth()->user();
        // //$user = User::find(1);

        // //dd($user);
        // return response()->json([
        //     'success' => true,
        //     'data' => [
        //         'token' => $user->createToken($user->name)->plainTextToken,
        //         'name' => $user->name
        //     ],
        //     'message' => 'User Logged !n :p'
        // ]);

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent();
    }
}
