<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Session;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('pages.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();
        if($user->EmpID)
        {
            $emp =$user->employee;
            // Session::put('DisplayName', $emp->sFirstName.' '.$emp->sLastName);
            // Session::put('Title', config('constants.title' . $emp->iTitle));
            
            Session::put('Title', ($emp->iTitle)?config('constants.title.'.$emp->iTitle):'-No Title-');

            Session::put('ProfileImage', $emp->sPhotoPath ? asset($emp->sPhotoPath) : asset('uploads/profile/default.jpg'));

        }
        else{
            Session::put('Title', 'Administrator');
            
            Session::put('ProfileImage', $user->sImgPath ? asset($user->sImgPath) : asset('uploads/profile/default.jpg'));
        }
            Session::put('DisplayName', $user->Name);

        return redirect()->intended(route('home', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
