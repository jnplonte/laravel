<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\AuthRedirectsUsers;
use App\Traits\MatchOldData;

use App\User;

use Validator;

class AccountController extends Controller
{
    use AuthRedirectsUsers;
    use MatchOldData;

    protected $userTable;

    protected $redirectTo = '/settings/account';

    protected $successMessage = 'Update Account Sucess';

    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');

        $this->userTable = config('auth.table');
    }

    public function getIndex()
    {
        $this->data['pageName'] = 'account-settings';

        $this->theme->setDescription($this->data[$this->userTable]['username'].' Account');
        $this->theme->setKeywords('');
        $this->theme->setTitle($this->data[$this->userTable]['username'].' Account');

        $this->theme->set('data', $this->data);

        return $this->theme->scope('settings.account')->render();
    }

    public function postIndex(Request $request)
    {
        $req_data = $request->all();

        if($this->matchData($req_data, 'username') == false){
          $validator = $this->_validator($req_data, 'username');
          if ($validator->fails()) {
              $this->throwValidationException(
                $request, $validator
            );
          }

          $this->_update($req_data, 'username');
        }

        if($this->matchData($req_data, 'email') == false){
          $validator = $this->_validator($req_data, 'email');
          if ($validator->fails()) {
              $this->throwValidationException(
                $request, $validator
            );
          }

          $this->_update($req_data, 'email');
        }

        //active
        if(empty($req_data['active'])){
          $req_data['active'] = 0;
        }else{
          $req_data['active'] = 1;
        }
        $this->_update($req_data, 'active');

        return redirect($this->redirectPath())->with('message', $this->successMessage);
    }

    protected function _validator(array $data, $param)
    {
        $vData = array();

        if($param == 'username'){
          $vData = array(
            'username' => 'required|alpha_dash|max:255|unique:userInfo'
          );
        }

        if($param == 'email'){
          $vData = array(
            'email' => 'required|email|max:255|unique:userInfo'
          );
        }

        return Validator::make($data, $vData);
    }

    protected function _update(array $data, $param)
    {
        $vData = array();
        $id = $this->data[$this->userTable]['id'];
        $vData[$param] = $data[$param];

        $userInfo = new User();
        $userInfo::where('id', $id)->update($vData);
    }
}
