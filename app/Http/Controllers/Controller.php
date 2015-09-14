<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Auth;
use Theme;

abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    protected $theme;

    protected $data;

    public function __construct()
    {
        $themeAlias = env('APP_THEME', 'default');
        $this->theme = Theme::uses($themeAlias)->layout(env('APP_LAYOUT', 'default'));

        if (Auth::user()) {
            $this->data['user'] = Auth::user();
        }
    }
}
