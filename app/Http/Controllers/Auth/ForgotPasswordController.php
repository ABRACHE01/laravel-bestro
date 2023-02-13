<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Auth;
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
    protected $redirectTo;
    public function redirectTo()
    {
    switch (Auth::user()->role_id) {
    case '1':
        $this->redirectTo = '/admin';
        return $this->redirectTo;
        break;
    
    case '2':
        $this->redirectTo = '/user';
        return $this->redirectTo;
        break;
    default:
       $this->redirectTo = '/login';
       return $this->redirectTo;
    }
    // return $next($request);
    }
    
}
