<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;

use App\userData;

class ProfileController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');

        $this->data['pageName'] = 'Profile';
    }

    public function getIndex()
    {
        $userTable = config('auth.table');
        $this->theme->setDescription($this->data[$userTable]['username'].' Profile');
        $this->theme->setKeywords('');
        $this->theme->setTitle($this->data[$userTable]['username'].' Profile');

        $id = $this->data[$userTable]['id'];

        $userData = new userData;
        $userDataValue = $userData->getUser($id);
        $this->data['userData'] = $userDataValue;

        $this->theme->set('data', $this->data);

        return $this->theme->scope('profile.index')->render();
    }
}
