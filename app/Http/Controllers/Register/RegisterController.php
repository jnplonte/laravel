<?php

namespace App\Http\Controllers\Register;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Traits\AuthRedirectsUsers;

use App\User;
use App\userData;

use Validator;

class RegisterController extends Controller
{
    use AuthRedirectsUsers;

    protected $redirectTo = '/';

    protected $successMessage = 'Register Sucess';

    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest');
    }

    public function getRegister()
    {
        $this->data['name'] = 'register';

        $this->theme->setDescription('TeeplusDesc');
        $this->theme->setKeywords('TeeplusKey');
        $this->theme->set('data', $this->data);

        $this->theme->setTitle('indexTitle');

        return $this->theme->scope('register.register')->render();
    }

    public function postRegister(Request $request)
    {
        $validator = $this->_validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $fData = $this->_create($request->all());

        if(!empty($fData)){
            $userData = new userData;
            $userData->id = $fData->id;
            $userData->save();
        }

        //remove auto login
        //Auth::login($fData);

        return redirect($this->redirectPath())->with('message', $this->successMessage);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function _validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|alpha_dash|max:255',
            'email' => 'required|email|max:255|unique:userInfo',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     *
     * @return User
     */
    protected function _create(array $data)
    {
        if(empty($data['role'])){
          $data['role'] = config('auth.defaults.role');
        }

        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => $data['role']
        ]);
    }
}
