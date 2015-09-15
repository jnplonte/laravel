<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\AuthRedirectsUsers;
use App\userData;
use Validator;

class ProfileController extends Controller
{
    use AuthRedirectsUsers;

    protected $userTable;

    protected $redirectTo = '/profile-settings';

    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');

        $this->userTable = config('auth.table');

        $this->data['pageName'] = 'Profile';
    }

    public function getIndex()
    {
        $this->theme->setDescription($this->data[$this->userTable]['username'].' Profile');
        $this->theme->setKeywords('');
        $this->theme->setTitle($this->data[$this->userTable]['username'].' Profile');

        $id = $this->data[$this->userTable]['id'];

        $userData = new userData();
        $this->data['userData'] = $userData::find($id)->getOriginal();

        $this->theme->set('data', $this->data);

        return $this->theme->scope('settings.profile')->render();
    }

    public function postIndex(Request $request)
    {
        $validator = $this->_validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
              $request, $validator
          );
        }

        $this->_save($request->all());

        return redirect($this->redirectPath())->withInput();
    }

    protected function _validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|alpha|max:255',
            'lastname' => 'required|alpha|max:255',
            'address' => '',
            'contact_number' => 'integer',
            'birth_date' => '',
        ]);
    }

    protected function _save(array $data)
    {
        $id = $this->data[$this->userTable]['id'];

        //remove token
        unset($data['_token']);

        $userData = new userData();
        $userData::where('id', $id)->update($data);
    }
}
