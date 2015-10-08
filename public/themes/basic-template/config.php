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
          /*
           * CSS
           */
          $theme->asset()->add('normalize', 'libraries/foundation/css/normalize.css');
          $theme->asset()->add('foundation', 'libraries/foundation/css/foundation.min.css');
          $theme->asset()->add('foundation-icons', 'libraries/foundation-icons/foundation-icons.css');
          $theme->asset()->add('foundation-datepicker', 'libraries/bower_components/foundation-datepicker/css/foundation-datepicker.min.css');

          /*
           * JS
           */
          $theme->asset()->add('modernizr', 'libraries/foundation/js/vendor/modernizr.js');
          $theme->asset()->add('jquery', 'libraries/foundation/js/vendor/jquery.js');
          $theme->asset()->add('fastclick', 'libraries/foundation/js/vendor/fastclick.js');
          $theme->asset()->add('base-helper', 'libraries/helpers/base-helper.js');
          $theme->asset()->add('foundation', 'libraries/foundation/js/foundation.min.js');
          $theme->asset()->add('foundation-datepicker', 'libraries/bower_components/foundation-datepicker/js/foundation-datepicker.min.js');

          $actionName = str_replace('@', '', strstr(Route::getCurrentRoute()->getActionName(), '@'));
          if (in_array($actionName, array('getUsers'))) {
              $theme->asset()->add('responsive-tables', 'libraries/responsive-tables/responsive-tables.css');
              $theme->asset()->add('responsive-tables', 'libraries/responsive-tables/responsive-tables.js');
          }

          $theme->asset()->usePath()->add('css', 'css/style.css');
          $theme->asset()->usePath()->add('js', 'js/script.js');
        },

        // Listen on event before render a layout,
        // this should call to assign style, script for a layout.
        'beforeRenderLayout' => array(
            'default' => function ($theme) {
              $theme->asset()->usePath()->add('layout-css', 'css/default/style.css');
              $theme->asset()->usePath()->add('layout-js', 'js/default/script.js');
            },
        ),

    ),

);
