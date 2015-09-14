<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getIndex()
    {
        $this->data['name'] = 'Teeplus';

        $this->theme->setDescription('TeeplusDesc');
        $this->theme->setKeywords('TeeplusKey');
        $this->theme->set('data', $this->data);

        $this->theme->setTitle('indexTitle');

        return $this->theme->scope('home.index')->render();
    }
}
