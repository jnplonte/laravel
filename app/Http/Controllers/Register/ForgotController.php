<?php

namespace App\Http\Controllers\Register;

use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Traits\AuthRedirectsUsers;
use App\User;

//use Mail;

class ForgotController extends Controller
{
    use AuthRedirectsUsers;

    protected $emailSubject = 'Email';

    protected $redirectTo = '/';

    protected $forgotSuccessMessage = 'Forgot Sucess';

    protected $resetSuccessMessage = 'Reset Sucess';

    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest');
    }

   /**
    * Display the form to request a password reset link.
    *
    * @return \Illuminate\Http\Response
    */
   public function getForgot()
   {
       $this->data['name'] = 'forgot-password';

       $this->theme->setDescription('TeeplusDesc');
       $this->theme->setKeywords('TeeplusKey');
       $this->theme->set('data', $this->data);

       $this->theme->setTitle('indexTitle');

       return $this->theme->scope('register.forgot')->render();
   }

   /**
    * Send a reset link to the given user.
    *
    * @param  \Illuminate\Http\Request  $request
    *
    * @return \Illuminate\Http\Response
    */
   public function postForgot(Request $request)
   {
       $this->validate($request, ['email' => 'required|email']);

       //print_r($request->only('email'));

       $response = Password::sendResetLink($request->only('email'), function (Message $message) {
           $message->subject($this->_getEmailSubject());
       });

       switch ($response) {
           case Password::RESET_LINK_SENT:
               return redirect()->back()->with('message', $this->forgotSuccessMessage);

           case Password::INVALID_USER:
               return redirect()->back()->withErrors(['email' => trans($response)]);
       }
   }

   /**
    * Get the e-mail subject line to be used for the reset link email.
    *
    * @return string
    */
   protected function _getEmailSubject()
   {
       return isset($this->emailSubject) ? $this->emailSubject : 'Your Password Reset Link';
   }

   /**
    * Display the password reset view for the given token.
    *
    * @param  string  $token
    *
    * @return \Illuminate\Http\Response
    */
   public function getReset($token = null)
   {
       if (is_null($token)) {
           throw new NotFoundHttpException();
       }

       $this->data['name'] = 'reset-password';
       $this->data['token'] = $token;

       $this->theme->setDescription('TeeplusDesc');
       $this->theme->setKeywords('TeeplusKey');
       $this->theme->set('data', $this->data);

       $this->theme->setTitle('indexTitle');

       return $this->theme->scope('register.reset')->render();
   }

   /**
    * Reset the given user's password.
    *
    * @param  \Illuminate\Http\Request  $request
    *
    * @return \Illuminate\Http\Response
    */
   public function postReset(Request $request)
   {
       $this->validate($request, [
           'token' => 'required',
           'email' => 'required|email',
           'password' => 'required|confirmed',
       ]);

       $credentials = $request->only(
           'email', 'password', 'password_confirmation', 'token'
       );

       $response = Password::reset($credentials, function ($user, $password) {
           $this->_resetPassword($user, $password);
       });

       switch ($response) {
           case Password::PASSWORD_RESET:
               return redirect($this->redirectPath())->with('message', $this->resetSuccessMessage);;

           default:
               return redirect()->back()
                           ->withInput($request->only('email'))
                           ->withErrors(['email' => trans($response)]);
       }
   }

   /**
    * Reset the given user's password.
    *
    * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
    * @param  string  $password
    */
   protected function _resetPassword($user, $password)
   {
       $user->password = bcrypt($password);

       $user->save();

       //remove auto login
       //Auth::login($user);
   }

}
