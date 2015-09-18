<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\AuthRedirectsUsers;

use App\User;

use Validator;

class AccountController extends Controller
{
    use AuthRedirectsUsers;

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
        $this->data['pageName'] = 'profile-settings';

        $this->theme->setDescription($this->data[$this->userTable]['username'].' Profile');
        $this->theme->setKeywords('');
        $this->theme->setTitle($this->data[$this->userTable]['username'].' Profile');

        $id = $this->data[$this->userTable]['id'];

        //$userData = new userData();
        //$this->data['userData'] = $userData::find($id)->getOriginal();

        $this->theme->set('data', $this->data);

        return $this->theme->scope('settings.account')->render();
    }

    public function postIndex(Request $request)
    {
        // $req_data = $request->all();
        // $hasImg = false;
        // if(!empty($req_data['picture'])){
        //   $req_data['picture'] = Input::file('picture');
        //   $hasImg = true;
        // }
        //
        // $validator = $this->_validator($req_data, $hasImg);
        //
        // if ($validator->fails()) {
        //     $this->throwValidationException(
        //       $request, $validator
        //   );
        // }
        //
        // //img upload
        // if(!empty($req_data['picture'])){
        //   $req_data['picture'] = $this->_uploadPicture(Input::file('picture'), $req_data['old_picture']);
        // }else{
        //   unset($req_data['picture']);
        // }
        //
        // //save file
        // $this->_update($req_data);
        //
        // return redirect($this->redirectPath())->with('message', $this->successMessage);
    }

    protected function _validator(array $data, $hasImg)
    {
        // $vData = array(
        //     'firstname' => 'required|max:255',
        //     'lastname' => 'required|max:255',
        //     'address' => '',
        //     'contact_number' => 'integer',
        //     'birth_date' => ''
        // );
        //
        // if(!empty($hasImg)){
        //   $vData['picture'] = 'image';
        // }
        //
        // return Validator::make($data, $vData);
    }

    protected function _update(array $data)
    {
    //     $id = $this->data[$this->userTable]['id'];
    //
    //     //remove unused info
    //     unset($data['_token']); unset($data['old_picture']);
    //
    //     $userData = new userData();
    //     $userData::where('id', $id)->update($data);
    }
}
