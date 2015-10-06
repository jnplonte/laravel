<?php

namespace App\Http\Controllers\Logout;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    protected $successMessage = 'Log-out Sucess';

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        Auth::logout();

        return redirect(property_exists($this, 'redirectAfterLogout') ?
        $this->redirectAfterLogout : '/')->with('message', $this->successMessage);
    }
}
