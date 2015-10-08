<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\AuthRedirectsUsers;

use App\userData;
use App\User;

use Validator;
use Input;

class UserController extends Controller
{
    use AuthRedirectsUsers;

    protected $userTable;

    protected $redirectTo = '/users';

    protected $successMessage = 'Update User Sucess';

    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth.admin');

        $this->userTable = config('auth.table');
    }

    public function getUsers()
    {
        $this->data['name'] = 'users';

        $this->theme->setDescription('TeeplusDesc');
        $this->theme->setKeywords('TeeplusKey');
        $this->theme->setTitle('indexTitle');

        $userData = new userData();
        $getData = Input::get();

        //remove page
        unset($getData['page']);

        $this->data['getData'] = $getData;

        $sort = !empty($getData['s']) ? $getData['s'] : null;
        $type = !empty($getData['t']) ? $getData['t'] : null;
        $search = !empty($getData['q']) ? $getData['q'] : null;

        $this->data['usersData'] = $userData->getUsers($sort, $type, $search);

        $this->theme->set('data', $this->data);

        return $this->theme->scope('admin.users')->render();
    }

    public function getUser($id = null)
    {
        $this->data['name'] = 'user';

        $this->theme->setDescription('TeeplusDesc');
        $this->theme->setKeywords('TeeplusKey');
        $this->theme->setTitle('indexTitle');

        $userData = new userData();

        $this->data['userData'] = $userData->getUser($id);

        if( !empty($this->data['userData']) && is_numeric($id) ){
          $this->theme->set('data', $this->data);
          return $this->theme->scope('admin.user')->render();
        }else{
          abort('404');
        }
    }

    public function postUser($id = null, Request $request)
    {
        $req_data = $request->all();

        $validator = $this->_validator($req_data);
        if ($validator->fails()) {
            $this->throwValidationException(
              $request, $validator
          );
        }

        $this->_update($req_data, $id);

        $this->redirectTo = '/user/'.$id;

        return redirect($this->redirectPath())->with('message', $this->successMessage);
    }

    protected function _validator(array $data)
    {
        return Validator::make($data, [
            'role' => 'required|integer',
            'active' => 'required|integer'
        ]);
    }

    protected function _update(array $data, $id)
    {
        //remove unused info
        unset($data['_token']);

        $userInfo = new User();
        $userInfo::where('id', $id)->update($data);
    }
}
