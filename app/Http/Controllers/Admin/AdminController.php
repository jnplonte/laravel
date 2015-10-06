<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth.admin');
    }

    public function getIndex()
    {
        $this->data['name'] = 'admin';

        $this->theme->setDescription('TeeplusDesc');
        $this->theme->setKeywords('TeeplusKey');
        $this->theme->setTitle('indexTitle');

        $this->theme->set('data', $this->data);

        return $this->theme->scope('admin.index')->render();
    }
}
