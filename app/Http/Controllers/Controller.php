<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Auth;
use Theme;
use Route;

abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    protected $theme;

    protected $data;

    protected $actionName;

    public function __construct()
    {
        $themeAlias = env('APP_THEME', 'default');
        $this->theme = Theme::uses($themeAlias)->layout(env('APP_LAYOUT', 'default'));

        $this->actionName = str_replace('@', '', strstr(Route::getCurrentRoute()->getActionName(), '@'));

        if (Auth::user()) {
            $userTable = config('auth.table');
            $this->data[$userTable] = Auth::user()->getOriginal();
        }
    }

}
