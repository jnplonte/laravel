<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Inherit from another theme
    |--------------------------------------------------------------------------
    |
    | Set up inherit from another if the file is not exists,
    | this is work with "layouts", "partials", "views" and "widgets"
    |
    | [Notice] assets cannot inherit.
    |
    */

    'inherit' => null, //default

    /*
    |--------------------------------------------------------------------------
    | Listener from events
    |--------------------------------------------------------------------------
    |
    | You can hook a theme when event fired on activities
    | this is cool feature to set up a title, meta, default styles and scripts.
    |
    | [Notice] these event can be override by package config.
    |
    */

    'events' => array(

        // Before event inherit from package config and the theme that call before,
        // you can use this event to set meta, breadcrumb template or anything
        // you want inheriting.
        'before' => function ($theme) {
            // You can remove this line anytime.
            $theme->setTitle('Laravel Test');

            // Breadcrumb template.
            // $theme->breadcrumb()->setTemplate('
            //     <ul class="breadcrumb">
            //     @foreach ($crumbs as $i => $crumb)
            //         @if ($i != (count($crumbs) - 1))
            //         <li><a href="{{ $crumb["url"] }}">{{ $crumb["label"] }}</a><span class="divider">/</span></li>
            //         @else
            //         <li class="active">{{ $crumb["label"] }}</li>
            //         @endif
            //     @endforeach
            //     </ul>
            // ');
        },

        // Listen on event before render a theme,
        // this event should call to assign some assets,
        // breadcrumb template.
        'beforeRenderTheme' => function ($theme) {
          if(env('APP_DEBUG')){
            $theme->asset()->container('base-css')->add('normalize', 'libraries/foundation/css/normalize.css');
            $theme->asset()->container('base-css')->add('foundation', 'libraries/foundation/css/foundation.min.css');
            $theme->asset()->container('base-css')->add('foundation-icons', 'libraries/foundation-icons/foundation-icons.css');

            $theme->asset()->container('base-js')->add('modernizr', 'libraries/foundation/js/vendor/modernizr.js');
            $theme->asset()->container('base-js')->add('jquery', 'libraries/foundation/js/vendor/jquery.js');
            $theme->asset()->container('base-js')->add('fastclick', 'libraries/foundation/js/vendor/fastclick.js');
            $theme->asset()->container('base-js')->add('base-helper', 'libraries/helpers/base-helper.js');
            $theme->asset()->container('base-js')->add('base-libraries', 'libraries/helpers/base-libraries.js');
            $theme->asset()->container('base-js')->add('foundation', 'libraries/foundation/js/foundation.min.js');
          }else{
            $theme->asset()->container('base-css')->add('base-css', 'assets/base.min.css');
            $theme->asset()->container('base-js')->add('base-js', 'assets/base.min.js');
          }

          $actionName = Route::currentRouteName();
          if (in_array($actionName, array('users'))) {
              $theme->asset()->add('responsive-tables', 'libraries/responsive-tables/responsive-tables.css');
              $theme->asset()->add('responsive-tables', 'libraries/responsive-tables/responsive-tables.js');
          }

          if (in_array($actionName, array('get.profile'))) {
              $theme->asset()->add('date-picker', 'libraries/bower_components/foundation-datepicker/css/foundation-datepicker.min.css');
              $theme->asset()->add('date-picker', 'libraries/bower_components/foundation-datepicker/js/foundation-datepicker.min.js');
          }

          if(env('APP_DEBUG')){
            $theme->asset()->usePath()->add('css', 'css/style.css');
            $theme->asset()->usePath()->add('js', 'js/script.js');
          }else{
            $theme->asset()->add('css', 'assets/default.min.css');
            $theme->asset()->add('js', 'assets/default.min.js');
          }
        },

        // Listen on event before render a layout,
        // this should call to assign style, script for a layout.
        'beforeRenderLayout' => array(
            'default' => function ($theme) {
              if(env('APP_DEBUG')){
                $theme->asset()->container('theme-css')->usePath()->add('layout-css', 'css/default/style.css');
                $theme->asset()->container('theme-js')->usePath()->add('layout-js', 'js/default/script.js');
              }
            },
        ),
    ),

);
