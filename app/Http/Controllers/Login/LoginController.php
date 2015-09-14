<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Traits\AuthRedirectsUsers;

class LoginController extends Controller
{
    use AuthRedirectsUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest');
    }
    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        $this->data['name'] = 'Teeplus';

        $this->theme->setDescription('TeeplusDesc');
        $this->theme->setKeywords('TeeplusKey');
        $this->theme->set('data', $this->data);

        $this->theme->setTitle('indexTitle');

        return $this->theme->scope('login.login')->render();
    }

    /**
     * Handle a login request to the application.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);

        $credentials = $this->getCredentials($request);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $this->checkRole();

            return redirect()->intended($this->redirectPath());
        }

        return redirect($this->loginPath())
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => $this->getFailedLoginMessage(),
            ]);
    }

    protected function checkRole()
    {
        if (Auth::user()) {
            switch (Auth::user()->role) {
            case '1':
              $rPath = '/admin';
            break;

            case '2':
              $rPath = '/dashboard';
            break;

            case '3':
              $rPath = '/';
            break;
          }
            $this->redirectTo = $rPath;
        }
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    protected function getCredentials(Request $request)
    {
        return $request->only('email', 'password');
    }

    /**
     * Get the failed login message.
     *
     * @return string
     */
    protected function getFailedLoginMessage()
    {
        return 'These credentials do not match our records.';
    }

    /**
     * Get the path to the login route.
     *
     * @return string
     */
    public function loginPath()
    {
        return property_exists($this, 'loginPath') ? $this->loginPath : '/login';
    }
}
