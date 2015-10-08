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
        $req_data = $request->all();

        $validator = $this->_validator($req_data);

        if ($validator->fails()) {
            $this->throwValidationException(
              $request, $validator
          );
        }

        //update data
        $this->_update($req_data);

        return redirect($this->redirectPath())->with('message', $this->successMessage);
    }

    protected function _validator(array $data)
    {
      return Validator::make($data, [
          'password' => 'required|check_old_password',
          'new_password' => 'required|confirmed|min:6',
      ]);
    }

    protected function _update(array $data)
    {
      $id = $this->data[$this->userTable]['id'];

      $vData = array();

      //remove unused info
      $vData['password'] = bcrypt($data['new_password']);

      $userInfo = new User();
      $userInfo::where('id', $id)->update($vData);
    }
}
