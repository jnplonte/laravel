<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\userData;

use Input;

class UserController extends Controller
{
    protected $userTable;

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

        _debug($sort.' '.$type);

        $this->data['usersData'] = $userData->getUsers($sort, $type, $search);

        $this->theme->set('data', $this->data);

        return $this->theme->scope('admin.users')->render();
    }
}
