<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\AuthRedirectsUsers;

use App\User;

use Validator;

class PasswordController extends Controller
{
    use AuthRedirectsUsers;

    protected $userTable;

    protected $redirectTo = '/settings/password';

    protected $successMessage = 'Update Password Sucess';

    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');

        $this->userTable = config('auth.table');
    }

    public function getIndex()
    {
        $this->data['pageName'] = 'password-settings';

        $this->theme->setDescription($this->data[$this->userTable]['username'].' Account');
        $this->theme->setKeywords('');
        $this->theme->setTitle($this->data[$this->userTable]['username'].' Account');

        $id = $this->data[$this->userTable]['id'];

        $this->theme->set('data', $this->data);

        return $this->theme->scope('settings.password')->render();
    }

    public function postIndex(Request $request)
    {
        // $req_data = $request->all();
        //
        // if($this->_matchOldData($req_data, 'username') == false){
        //   $validator = $this->_validator($req_data, 'username');
        //   if ($validator->fails()) {
        //       $this->throwValidationException(
        //         $request, $validator
        //     );
        //   }
        //
        //   $this->_update($req_data, 'username');
        // }
        //
        // if($this->_matchOldData($req_data, 'email') == false){
        //   $validator = $this->_validator($req_data, 'email');
        //   if ($validator->fails()) {
        //       $this->throwValidationException(
        //         $request, $validator
        //     );
        //   }
        //
        //   $this->_update($req_data, 'email');
        // }
        //
        return redirect($this->redirectPath())->with('message', $this->successMessage);
    }

    protected function _validator(array $data, $param)
    {
        // $vData = array();
        //
        // if($param == 'username'){
        //   $vData = array(
        //     'username' => 'required|alpha_dash|max:255|unique:userInfo'
        //   );
        // }
        //
        // if($param == 'email'){
        //   $vData = array(
        //     'email' => 'required|email|max:255|unique:userInfo'
        //   );
        // }
        //
        // return Validator::make($data, $vData);
    }

    protected function _update(array $data, $param)
    {
        // $id = $this->data[$this->userTable]['id'];
        //
        // $vData = array();
        //
        // if(!empty($data[$param])){
        //   $vData[$param] = $data[$param];
        // }
        //
        // $userInfo = new User();
        // $userInfo::where('id', $id)->update($vData);
    }
}
