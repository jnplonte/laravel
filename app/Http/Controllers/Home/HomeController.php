<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

//jnpl test
use App\Facades\testFacades;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        // jnpl test
        $this->testFacades = new testFacades();
    }

    public function getIndex()
    {
        $this->data['name'] = 'home';

        $this->theme->setDescription('TeeplusDesc');
        $this->theme->setKeywords('TeeplusKey');
        $this->theme->set('data', $this->data);

        $this->theme->setTitle('indexTitle');

        // jnpl test
        echo $this->testFacades->test();

        return $this->theme->scope('home.index')->render();
    }
}
